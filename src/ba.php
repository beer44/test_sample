<?php

require __DIR__. '/util.php';

$r = basic_auth('get', 'https://httpbin.org/basic-auth/testuser/testpassword', []);

file_put_contents('log.txt', json_encode($r, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), FILE_APPEND);

echo $r['http_code'];
