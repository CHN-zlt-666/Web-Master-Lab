<?php
include "../../../includes/auth.php";
session_require_login();
include "../../../includes/header.php";
?>
<div class="main-center">
    <div class="login-box">
        <div class="vuln-title">Dom型xss靶场</div>
        <div class="vuln-desc">请进行参数测试</div>
        <input id="msg" type="text">
        <button onclick="show()">提交</button>
        <div id="result"></div>
    </div>
</div>
<script>
    //document.getElementById("result").innerHTML = decodeURIComponent(document.location.hash.substring(1));
    function show() {
        var result = document.getElementById("msg").value;
        //document.getElementById("result").innerHTML = result;
        document.getElementById("result").outerHTML = result;
    }
</script>
<?php
include "../../../includes/footer.php";
?>