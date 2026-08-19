<?php
include "../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <h1>Web-Master-Lab</h1>
        <p class="sub">选择认证方式</p>
        <div class="auth-card">
            <div class="icon">🛡️</div>
            <a href="login_session.php">
                <h3>Session认证</h3>
                <p>传统认证方式</p>
            </a>
        </div>
        <div class="auth-card">
            <div class="icon">🔑</div>
            <a href="login_jwt.php">
                <h3>Jwt认证</h3>
                <p>Token认证方式</p>
            </a>
        </div>
    </div>
</div>

<?php
include "../includes/footer.php";
?>