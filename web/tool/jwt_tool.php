<?php
if (isset($_GET['jwt'])) {
    if (!empty($_GET['jwt'])) {
        $jwt = $_GET['jwt'];
    } else {
        die("请输入jwt");
    }
}
$dict = [
    '123',
    '1234',
    '123456',
    '1234567',
    'myadmin',
    'testadmin'
];
function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
list($header, $payload, $signature) = explode(".", $jwt);
foreach ($dict as $secret) {
    $newsignature = base64url_encode(hash_hmac('sha256', $header . "." . $payload, $secret, true));
    if ($signature === $newsignature) {
        echo "密钥为:" . $secret;
        die();
    }
} ?>
<?php
include "../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <h1>请输入完整的jwt</h1>
        <form method="GET">
            <input type="text" name="jwt"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../../includes/footer.php";
?>