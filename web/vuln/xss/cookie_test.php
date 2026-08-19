<?php
session_start();
setcookie(
    "test",
    "123",
    [
        "httponly" => false // 设置为true之后，document无法读取cookie
    ]
);
?>
<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">Cookie演示界面</div>
        <div class="vuln-desc">演示document读取cookie能力</div>
        <img src="x" onerror="alert(document.cookie)">
    </div>
</div>
<img src="x" onerror="alert(document.cookie)">
<?php
include "../../../includes/footer.php";
?>