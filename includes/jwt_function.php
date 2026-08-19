<?php
//base64url编码函数代码
function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
//base64url解码函数代码
function base64url_decode($data)
{
    $data = strtr($data, '-_', '+/');
    $adding = strlen($data) % 4;
    if ($adding) {
        $data .= str_repeat('=', 4 - $adding);
    }
    return base64_decode($data);
}
//jwt生成函数
//传入payload与密钥，返回完整jwt
function jwt_create($payload, $secret)
{
    $Header = [
        "alg" => 'HS256',
        "typ" => 'JWT'
    ];
    $Header = base64url_encode(json_encode($Header));
    $payload = base64url_encode(json_encode($payload, JSON_UNESCAPED_UNICODE));
    $data = $Header . "." . $payload;
    $signature = base64url_encode(hash_hmac("sha256", $data, $secret, true));
    $jwt = $Header . "." . $payload . "." . $signature;
    return $jwt;
}
//jwt逻辑检查函数
//传入完整jwt与密钥，成功则返回payload进行后续使用，失败返回false
function jwt_verify($jwt, $secret)
{
    list($header, $payload, $signature) = explode(".", $jwt);
    $newsignature = base64url_encode(hash_hmac("sha256", $header . "." . $payload, $secret, true));
    if ($newsignature !== $signature) {
        return false;
    }
    return json_decode(base64url_decode($payload), true);
}
