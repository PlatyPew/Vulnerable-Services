#!#!/usr/bin/env python3

from z3 import *

s = Solver()

pwd = BitVecs('char[0] char[1] char[2] char[3]', 8)

s.add(8 * BV2Int(pwd[0])**2 + 2 * BV2Int(pwd[1])**4 - 3 * BV2Int(pwd[2])**3 +
      BV2Int(pwd[3])**2 == 3849056)


def validChars(x):
    return Or(x == ord('F'), x == ord('G'), x == ord('H'),
              x == ord('&'), x == ord('*'), x == ord('@'),
              x == ord('1'), x == ord('2'), x == ord('3'),
              x == ord('t'), x == ord('u'), x == ord('v'))


for i in range(4):
    s.add(validChars(pwd[i]))

assert s.check() == z3.sat
model = s.model()

out = ''
for c in pwd:
    out += chr(model[c].as_long() & 0xff)

print(f"Password: {out}")  # G&2t
