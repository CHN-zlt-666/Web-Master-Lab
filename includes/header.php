<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title><?php echo "Web Security Lab"; ?></title>
    <link rel="stylesheet" href="/css/vuln.css">
    <link rel="stylesheet" href="/css/first_login.css">
    <link rel="stylesheet" href="/css/base.css">
</head>

<body>
    <nav class="navbar">
        <span class="brand">Web-Master-Lab</span>
        <a href="/index.php">首页</a>
        <a href="/vuln/sqli/sqli1.php">SQL注入</a>
        <a href="/vuln/xss/xss1.php">反射型XSS</a>
        <a href="/vuln/xss/xss2.php">存储型XSS</a>
        <a href="/vuln/xss/xss3.php">dom型XSS</a>
        <a href="/vuln/csrf/csrf.php">csrf</a>
        <a href="/vuln/upload/file_upload.php">文件上传</a>
        <a href="/vuln/include/lfi.php">文件包含</a>
        <a href="/vuln/PHP_deserialization/test1.php">php反序列化</a>
        <a href="/vuln/command/command_injection.php">命令注入</a>
        <a href="/vuln/ssrf/ssrf.php">ssrf</a>
        <a href="/vuln/xxe/xxe1.php">xxe</a>
        <?php if (!empty($_SESSION['username'])) { ?>
            <span class="nav-divider"></span>
            <a class="nav-user" href="/users/user.php"><?php echo '您好，' . htmlspecialchars($_SESSION['username']); ?></a>
        <?php } ?>
    </nav>