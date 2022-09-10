from Crypto.PublicKey import RSA
from gmpy2 import *

import os

pub1 = RSA.import_key(open('./someuser.pub').read())
pub2 = RSA.import_key(open('./someotheruser.pub').read())

n1 = pub1.n
n2 = pub2.n

p = int(gcd(n1, n2))

q1 = divexact(n1, p)
q2 = divexact(n2, p)

os.system(f"rsactftool -p {p} -q {q1} -e 65537 --private --output someuser.priv")
