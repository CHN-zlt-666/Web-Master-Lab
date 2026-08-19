<?php
function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
$Header = [
    "alg" => 'HS256',
    "typ" => 'JWT'
];
$payload = [
    "user_name" => 'hacker',
    "role" => 'admin'
];
$Header = base64url_encode(json_encode($Header));
//$payload = base64url_encode(json_encode($payload, JSON_UNESCAPED_UNICODE));用户名存在中文时
$payload = base64url_encode(json_encode($payload));
$secret = "123456";
$data = $Header . "." . $payload;
$signature = base64url_encode(hash_hmac("sha256", $data, $secret, true));
$jwt = $Header . "." . $payload . "." . $signature; ?>
<?php
include "../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">JWT为:</div>
        <div class="vuln-desc">由后端代码所提供的身份,密钥生成</div>
        <?php echo "<div class='result'>" . $jwt . "</div>"; ?>
    </div>
</div>
<?php
include "../../includes/footer.php";
?>