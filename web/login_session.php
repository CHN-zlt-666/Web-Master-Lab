<?php
include "../includes/db.php"; //连接数据库
/** @var mysqli $conn */
session_set_cookie_params([
    "httponly" => true,
    //"samesite" => "Strict" 后续csrf实验时进行启用
]);
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //需要先检测是不是post传参进来的，因为第一次访问页面，fname不存在
    $ename = $_POST['fname'];
    $epassword = $_POST['password'];
    if (!empty($ename) && !empty($epassword)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=?"); //预处理
        $stmt->bind_param("s", $ename);
        $stmt->execute();
        $result = $stmt->get_result();
        //预处理语句进行防御sql注入
        if (mysqli_num_rows($result) > 0) { //检测账号是否存在
            $rows = mysqli_fetch_assoc($result);
            $role = $rows['role'];
            $_SESSION['username'] = $ename;
            $_SESSION['role'] = $role;
            $password1 = $rows['password'];
            //password_verify($epassword, $rows['password'])检查哈希加密之后的密码
            if ($password1 == $epassword) { //检查密码
                if ($role == 'admin') {
                    header("Location:admin/admin.php"); //存在越权漏洞，因为用户可以直接通过url的修改进入管理员界面
                    //通过添加session，拒绝了直接访问管理员界面的操作
                } else {
                    header("Location:users/user.php");
                }
            } else {
                $error = "密码错误";
            }
        } else {
            $error = "请输入正确的账号密码";
        }
        //这里后续进行数据过滤和数据库检查账号密码
    } else {
        $error = "账号密码不能为空";
    }
}
?>




<?php
include "../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <h1>请登录Web Lab</h1>
        <p class="sub">(session)</p>
        <?php if ($error) {
            echo "<p class='error'>" . $error . "</p>";
        } ?>
        <form method="POST">
            <input type="text" name="fname" placeholder="请输入用户名"> <br>
            <input type="password" name="password" placeholder="请输入密码"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../includes/footer.php";
?>