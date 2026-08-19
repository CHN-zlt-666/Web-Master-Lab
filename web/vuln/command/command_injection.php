<?php
include "../../../includes/auth.php";
session_require_login();
$result = '';
if (isset($_GET['cmd']) && !empty($_GET['cmd'])) {
    //system("ping " . $_GET['cmd']);
    $cmd = $_GET['cmd'];
    str_replace(" ", "", $cmd); //空格限制防御
    str_replace("&", "", $cmd);
    str_replace("&&", "", $cmd);
    str_replace("||", "", $cmd); //黑名单替换操作
    if (!preg_match('/^[0-9.]+$/', $cmd)) { //白名单只允许用户输入ip
        die("非法输入");
    }
    ob_start();                              // 缓冲区
    system("ping " . $cmd);
    $result = ob_get_clean();
}
?>

<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">命令注入测试靶场</div>
        <div class="vuln-desc">请输入OS参数进行测试</div>
        <?php if ($result) {
            echo "<pre>" . $result . "</pre>";
        } ?>
        <form method="GET">
            <input type="text" name="cmd"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>