<?php
include "../../includes/auth.php";
$secret = "web-master-user-secret";
$name = session_require_login();
$payload = jwt_require_login($secret);
if ($payload['role'] !== 'user') {
    die("抱歉,您无此权限");
} elseif ($name !== $payload['user_name']) {
    die("检测到您并非" . $payload['user_name'] . "本人, 请停止操作");
}
$welcome = "<h3>您好，" . $payload['user_name'] . '</h3>';
//
$id_result = '';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    if ($id == $payload['user-id']) {
        $id_result = "id为:" . $id . "的用户的身份信息";
    } else {
        $id_result = "您无此权限进行访问该id的资源";
    }
    //echo "id为:" . $id . "的用户的身份信息";
}
?>

<?php
include "../../includes/header.php";
?>
<div class="main-center">
    <h3><?php echo $welcome ?></h3> //后续添加一个css类
    <h1 class="title">用户界面（jwt版）</h1>
    <?php echo $id_result; ?>
</div>

<?php
include "../../includes/footer.php";
?>