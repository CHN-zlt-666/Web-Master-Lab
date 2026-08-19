<?php
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
    die("403 Forbidden");
}
echo "管理员页面";
echo "<br>";
echo "pssword:12345";
