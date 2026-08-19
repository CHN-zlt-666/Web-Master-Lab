<?php
include "../../../includes/auth.php";
session_require_login();
$message = '';
if (isset($_FILES['file']) && !empty($_FILES['file'])) {
    //print_r($_FILES); //进行查看FILES超级全局变量的内容
    $name = $_FILES['file']['name'];
    /**if (strpos($name, 'jpg') === false) { 最简单的绕过，只用在文件里面添加jpg即可，后续进行后缀名检查
        die("只允许图片文件");
    } 
    $type = $_FILES['file']['type'];
    if ($type != 'image/jpeg') { //通过bp抓包绕过
        die('只允许图片类型');
    }
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $allow = ['jpg', 'png'];
    if (!in_array($ext, $allow)) {
        die('非法文件类型');
    }*/
    $tmp = $_FILES['file']['tmp_name'];
    if (getimagesize($tmp) === false) {
        die("文件头为非法文件头");
    }
    /**move_uploaded_file(
        $_FILES['file']['tmp_name'],
        "uploads/" .
            $_FILES['file']['name']
    );*/
    $info = getimagesize($tmp);
    $type = $info[2];
    switch ($type) { //进行二次渲染重构图片
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($tmp);
            $newname = uniqid() . ".jpg";
            imagejpeg(
                $image,
                "uploads/" . $newname
            );
            imagedestroy($image);
            $message = "上传成功";
            break;
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($tmp);
            $newname = uniqid() . ".gif";
            imagegif(
                $image,
                "uploads/" . $newname
            );
            imagedestroy($image);
            $message = "上传成功";
            break;
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($tmp);
            $newname = uniqid() . ".png";
            imagepng(
                $image,
                "uploads/" . $newname
            );
            imagedestroy($image);
            $message = "上传成功";
            break;
    }
}
?>
<?php
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">文件上传漏洞靶场测试</div>
        <div class="vuln-desc">请上传文件</div>
        <?php if ($message) {
            echo "<p class='error'>" . $message . "</p>";
        } ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file"> <br>
            <input type="submit" value="上传">
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>