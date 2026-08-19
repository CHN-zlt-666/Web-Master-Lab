<?php
include "../../../includes/auth.php";
session_require_login();
$result = '';
if (!empty($_GET['url'])) {
    $url = $_GET['url'];
    $result = "<h3>Server Request</h3>" . htmlspecialchars($url) . "<hr>";
    $response = @file_get_contents($url);
    if ($response === false) {
        $result .= "Request failed!";
    } else {
        $result .= $response;
    }
}
?>

<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">SSRF靶场测试</div>
        <div class="vuln-desc">请输入将要访问的URL</div>
        <?php if ($result) {
            echo  $result;
        } ?>
        <form method="GET">
            <input type="text" name="url"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>