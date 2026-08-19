<?php
session_start();
include "../../includes/auth.php";

$secret = "web-master-admin-secret";
$payload = jwt_require_login($secret);
if ($payload['role'] !== 'admin') {
    die("抱歉,您无此权限");
}
$welcome = "您好，" . $payload['user_name'];
?>

<?php
include "../../includes/header.php";
?>
<div class="main-center">
    <h1 class="title">管理员界面（jwt版）</h1>
    <h3 style="text-align:center"><?php echo $welcome; ?></h3>
</div>
<?php
include "../../includes/footer.php";
?>
