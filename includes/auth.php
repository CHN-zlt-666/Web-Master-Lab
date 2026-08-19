<?php
include "jwt_function.php";
//验证jwt登录状态，成功返回payload，失败跳转或报错
function jwt_require_login($secret)
{
    if (!isset($_COOKIE['token'])) {
        header("Location:/login_jwt.php");
        exit;
    } else {
        $payload = jwt_verify($_COOKIE['token'], $secret);
        if ($payload === false) {
            die("身份验证失败");
        }
        return $payload;
    }
}
//验证session登录状态，成功返回用户名用于检测用户是否使用自己账号登录，失败进行跳转
function session_require_login()
{
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location:/login.php");
        exit;
    }
    return $_SESSION['username'];
}
