<?php
session_start();

$content = '';
if ($_SESSION['role'] != 'admin') {
    $content = '<p class="error">无权限访问</p>';
} else {
    $content = '<h1 class="title">欢迎登录管理员界面</h1>';
}
?>

<?php
include "../../includes/header.php";
?>
<div class="main-center">
    <?php echo $content; ?>
</div>
<?php
include "../../includes/footer.php";
?>
