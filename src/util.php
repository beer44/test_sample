<?php

function basic_auth($method = 'post', $url = '', $param = [])
{
    // Basic AUTH set env by shell command.
    $USERNAME = getenv("BASIC_AUTH_USER");
    $PASSWORD = getenv("BASIC_AUTH_PASSWORD");

    if (!$USERNAME || !$PASSWORD) {
        throw new Exception("env BASIC_AUTH_USER BASIC_AUTH_PASSWORD needed.", 400);
    }

    $conn = curl_init();
    if ($method == 'post') {
        curl_setopt($conn, CURLOPT_POST, true);
    }
    curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($conn, CURLOPT_URL, $url);
    curl_setopt($conn, CURLOPT_USERPWD, "$USERNAME:$PASSWORD");

    if (!empty($param)) {
        curl_setopt($conn, CURLOPT_POSTFIELDS, http_build_query($param));
    }
    $result = curl_exec($conn);
    $http_code = curl_getinfo($conn, CURLINFO_HTTP_CODE);

    curl_close($conn);

    if (!$result) {
        throw new Exception("no response.", 400);
    }

    return [
        'http_code' => $http_code,
        'body' => $result,
    ];
}



//
function curl($method = 'post', $url = '', $param = [])
{
    $conn = curl_init();
    if ($method == 'post') {
        curl_setopt($conn, CURLOPT_POST, true);
    }
    curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($conn, CURLOPT_URL, $url);
    if (empty($param)) {
        curl_setopt($conn, CURLOPT_POSTFIELDS, http_build_query($param));
    }
    $result = curl_exec($conn);
    $http_code = curl_getinfo($conn, CURLINFO_HTTP_CODE);

    curl_close($conn);

    if (!$result) {
        throw new Exception("no response.", 400);
    }

    return [
        'http_code' => $http_code,
        'body' => $result,
    ];
}
