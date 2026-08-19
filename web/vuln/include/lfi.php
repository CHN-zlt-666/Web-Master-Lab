<?php
include "../../../includes/auth.php";
session_require_login();

$result = '';
if (isset($_GET['file']) && !empty($_GET['file'])) {
    ob_start();
    include($_GET['file']);
    $result = ob_get_clean();
}

/* 白名单防御
  $allow = [
      "home" => "home.php",
      "test" => "test.php"
  ];
  if (isset($_GET['page'])) {
      include($allow[$_GET['page']]);
  }
  */
?>

<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">文件包含靶场测试</div>
        <div class="vuln-desc">请输入要包含的文件路径</div>
        <?php if ($result) {
            echo "<pre>" . $result . "</pre>";
        } ?>
        <form method="GET">
            <input type="text" name="file"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>