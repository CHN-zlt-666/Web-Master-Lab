<?php
$host = "localhost";
$user = "";
$password = "";
$dbname = "websec";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("数据库连接失败");
}
