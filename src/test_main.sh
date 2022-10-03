#!/bin/bash

# 全てのテスト前
oneTimeSetUp() {
    LOG_FILE=$(pwd)/log.txt
    if [ -f "$LOG_FILE" ]; then
        rm "$LOG_FILE"
    fi
}

# 全てのテスト後
oneTimeTearDown() {
    :
}

# 各テスト前
setUp() {
    :
}

# 各テスト後
tearDown() {
    :
}

# 実行するテスト一覧
suite() {
    suite_addTest test_basic_auth
    # suite_addTest test_json_post
    # suite_addTest test_thanx
}

test_basic_auth() {
    EXPECTED="200"
    ACTUAL=$(php ba.php ${EXPECTED})
    assertEquals ${EXPECTED} ${ACTUAL}
}

# shellテストライブラリをDL
SHUNIT2_ZIP_FILE=$(pwd)/shunit2/master.zip

if [ ! -f "$SHUNIT2_ZIP_FILE" ]; then
    wget -qP $(pwd)/shunit2 https://github.com/kward/shunit2/archive/refs/heads/master.zip
    unzip -qq "$SHUNIT2_ZIP_FILE" -d $(pwd)/shunit2
    # shUnit2のロード
    . ./shunit2/shunit2-master/shunit2
else
    . ./shunit2/shunit2-master/shunit2
fi
