#!#!/usr/bin/env python3

from z3 import *

final = ''

final += chr(71)
final += chr(38)

s = Solver()
pwd1 = BitVecs('char[0] char[1]', 8)

s.add(BV2Int(pwd1[0]) * BV2Int(pwd1[1]) == 5800)

s.add(BV2Int(pwd1[0]) - BV2Int(pwd1[1]) == -66)

assert s.check() == z3.sat
model = s.model()

for c in pwd1:
    final += chr(model[c].as_long() & 0xff)

ss = Solver()
pwd2 = BitVecs('char[0] char[1] char[2] char[3]', 8)

dec = [ord(i) for i in final]


def calc_one():
    return 576 - dec[0] - dec[1] - dec[2] - dec[3]


def calc_two():
    return 2685 - dec[0] - 2 * dec[1] - 3 * dec[2] - 4 * dec[3]


def calc_three():
    return -434 - dec[0] + dec[1] + dec[2] + dec[3]


def calc_four():
    return 648891911 - 8 * (dec[0]**2) - 2 * (dec[1]**4) + 3 * (dec[2]**3) - dec[3]**2


ss.add(BV2Int(pwd2[0]) + BV2Int(pwd2[1]) + BV2Int(pwd2[2]) + BV2Int(pwd2[3]) == calc_one())

ss.add(5 * BV2Int(pwd2[0]) + 6 * BV2Int(pwd2[1]) + 7 * BV2Int(pwd2[2]) +
       8 * BV2Int(pwd2[3]) == calc_two())

ss.add(-BV2Int(pwd2[0]) - BV2Int(pwd2[1]) - BV2Int(pwd2[2]) - BV2Int(pwd2[3]) == calc_three())

ss.add(74 * (BV2Int(pwd2[0])**2) - 9 * (BV2Int(pwd2[1])**3) + 7 * (BV2Int(pwd2[2])**4) -
       BV2Int(pwd2[3])**2 == calc_four())

assert ss.check() == z3.sat
model = ss.model()

for c in pwd2:
    final += chr(model[c].as_long() & 0xff)

print(f"Password: {final}")  # G&2t^4b9
