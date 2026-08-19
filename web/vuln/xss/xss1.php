<?php
include "../../../includes/auth.php";
session_require_login();
$error = '';
$result = '';
if (isset($_GET['message'])) {
    if (!empty($_GET['message'])) {
        $mode = $_GET['mode'];
        $message = $_GET['message'];
        switch ($mode) {
            case "test1":
                $result = $message;
                break;
            case "test2":
                $result = htmlspecialchars($message);
        }
    } else {
        $error = "请输入内容";
    }
} ?>


<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <?php if ($error) {
            echo "<p class='error'>" . $error . "</p>";
        } ?>
        <form method='GET'>
            <div class="vuln-title">反射型XSS靶场测试</div>
            <div class="vuln-desc">请选择模式，进行参数测试</div>
            <?php echo $result; ?>
            <input type="text" name='message'> <br>
            <input type="submit" value="提交">
            <br>
            <select name='mode'>
                <option value='test1'>
                    漏洞模式
                </option>
                <option value="test2">
                    html防御
                </option>
            </select>
            <br>
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>