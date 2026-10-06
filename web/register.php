<?php
include "../includes/db.php";
/** @var mysqli $conn */
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ename = $_POST['fname'];
    $epassword = $_POST['password'];
    if ($ename != "" && $epassword != "") {
        $sql = $conn->prepare("SELECT id FROM users WHERE username=?");
        $sql->bind_param("s", $ename);
        $sql->execute();
        $result = $sql->get_result();
        if (mysqli_num_rows($result) > 0) {
            $error = "用户已存在";
        } else {
            $hashpassword = password_hash($epassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare(
                "INSERT INTO users (username, password) VALUES (?, ?)"
            );
            $stmt->bind_param("ss", $ename, $hashpassword);

            if ($stmt->execute()) {
                $error = "注册成功";
            } else {
                $error = "注册失败";
            }
        }
    } else {
        $error = "请输入账号密码";
    }
}
?>

<?php
include "../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">欢迎注册Web-Master-Lab</div>
        <div class="vuln-desc">用户名使用汉字或英文</div>
        <?php if ($error) {
            echo "<p class='error'>" . $error . "</p>";
        } ?>
        <form method="POST">
            <input type="text" name="fname" placeholder="请输入用户名"> <br>
            <input type="password" name="password" placeholder="请输入密码"> <br>
            <input type="submit" value="注册">
        </form>
    </div>
</div>
<?php
include "../includes/footer.php";
?>