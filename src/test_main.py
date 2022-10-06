#! /usr/bin/env python3

import unittest
# https://docs.python.org/ja/3/library/unittest.html#assert-methods

from tests import site_alive


class TestSample(unittest.TestCase):
    def test_upper(self):
        actual = 'foo'.upper()
        expcted = 'FOO'
        with self.subTest(actual=actual):
            self.assertEqual(actual, expcted)

    def test_github_alive(self):
        res = site_alive.check_github_alive()
        self.assertEqual(res, 200)

# https://docs.python.org/ja/3/library/unittest.html?highlight=assert#distinguishing-test-iterations-using-subtests
# サブテストを利用して繰り返しテストの区別を付ける


if __name__ == '__main__':
    unittest.main()
