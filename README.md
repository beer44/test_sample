# テスト実行環境

## 構築

.env.exampleをコピーして.env作成

docker-compose up -d でubuntuイメージにphp、python3インストール

## テスト

テスト実行ファイルは ^test.*?\.sh$　のネーミングルール

起動中のコンテナ名で実行

docker exec ubuntu-test run-parts --regex '^test.*?\.sh$' ./

