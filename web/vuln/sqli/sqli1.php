<?php
include "../../../includes/auth.php";
session_require_login();
include "../../../includes/db.php";
/**@var mysqli $conn*/
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ename = $_POST['name'];
    $epassword = $_POST['password'];
    if (!empty($ename) && !empty($epassword)) {
        /**
         * 最基础的sql注入防御
         * $ename = mysqli_real_escape_string($conn, $ename);*/
        //也可以用到类型转化
        $sql = "SELECT * FROM SQLIUSERS WHERE username='$ename' AND password='$epassword'";
        //这里的$ename和另一个变量需要用引号括起来，因为涉及到sql的语句拼接，如果不加上数据库会把变量值当作字段名而不是字符串
        $result = mysqli_query($conn, $sql);
        if (!$result) {
        } else {
            if (mysqli_num_rows($result) > 0) {
                /**$rows = mysqli_fetch_array($result);
                $user = $rows['username'];
                echo "欢迎$user";*/
                header("Location:success.php");
            } else {
                $error = "请输入正确的账号密码";
            } //将else错误提醒去掉之后，可以进行时间盲注的操作
        }
        //此处往下可继续更新php
    }
}
?>

<?php
include "../../../includes/header.php";
?>

<div class="main-center">
    <div class="login-box">
        <?php if ($error) {
            echo '<p class="error">' . $error . '</P>';
        }
        ?>
        <div class="vuln-title">Sql靶场测试</div>
        <div class="vuln-desc">请输入Sql参数进行测试</div>
        <form method="POST">
            <input type="text" name="name"> <br>
            <input type="password" name="password"> <br>
            <input type="submit" value="登录">
        </form>
    </div>
</div>

<?php
include "../../../includes/footer.php";
?>