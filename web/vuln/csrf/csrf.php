<?php
include "../../../includes/auth.php";
session_require_login();
include "../../../includes/db.php";
/**@var mysqli $conn */
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
//echo $_SESSION['token'];
$error = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['password'])) {
        $pw = $_POST['password'];
        $hashpw = password_hash($pw, PASSWORD_DEFAULT);
        $username = $_SESSION['username'];
        $token = $_POST['token'];
        if ($token === $_SESSION['token']) {
            $sql = $conn->prepare("UPDATE users SET password=? WHERE username=?");
            $sql->bind_param("ss", $hashpw, $username);
            if ($sql->execute()) {
                if ($sql->affected_rows > 0) {
                    $error = "修改成功";
                } else {
                    $error = "不能修改为相同的密码";
                }
            }
        } else {
            $error = "已被服务器拒绝访问";
        }
    } else {
        $error = "请输入密码";
    }
}
?>

<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <?php if ($error) {
            echo "<p class='error'>" . $error . "</p>";
        } ?>
        <form method="POST">
            <div class="vuln-title">CSRF靶场测试</div>
            <div class="vuln-desc">模拟账号密码修改进行csrf测试</div>
            <input type="hidden" name=token value="<?php echo $_SESSION['token']; ?>">
            <input type="password" name="password"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>