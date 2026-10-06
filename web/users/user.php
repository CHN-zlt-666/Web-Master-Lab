<?php
include "../../includes/auth.php";
session_require_login();
?>
<?php
include "../../includes/header.php";
?>

<div class="main-center">
    <h1 class="title">欢迎来到Web Security Lab，请选择项目</h1>
    <div class="menu">
        <a class="menu-card" href="../vuln/sqli/sqli1.php"> sqli注入</a>
        <a class="menu-card" href="../vuln/xss/xss1.php"> 反射型xss</a>
        <a class="menu-card" href="../vuln/xss/xss2.php"> 存储型xss</a>
        <a class="menu-card" href="../vuln/xss/xss3.php"> dom型xss</a>
        <a class="menu-card" href="../vuln/xss/cookie_test.php">cookie</a>
        <a class="menu-card" href="../vuln/csrf/csrf.php">csrf</a>
        <a class="menu-card" href="../vuln/upload/file_upload.php">文件上传漏洞</a>
        <a class="menu-card" href="../vuln/include/lfi.php">文件包含漏洞</a>
        <a class="menu-card" href="../vuln/command/command_injection.php">命令注入</a>
        <a class="menu-card" href="../vuln/PHP_Deserialization/test1.php"> 反序列化</a>
        <a class="menu-card" href="../vuln/xxe/xxe1.php">xxe</a>
        <a class="menu-card" href="../vuln/ssrf/ssrf.php">ssrf</a>
    </div>
</div>
<?php
include "../../includes/footer.php";
?>