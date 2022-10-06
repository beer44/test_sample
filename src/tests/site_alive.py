#! /usr/bin/env python3

import requests


def check_github_alive():
    response = requests.get("https://github.co.jp/")
    return response.status_code
