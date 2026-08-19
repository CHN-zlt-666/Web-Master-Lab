<?php
include "../../../includes/auth.php";
session_require_login();
include "../../../includes/db.php";
/** @var mysqli $conn  */
if (isset($_GET['message'])) {
    if (!empty($_GET['message'])) {
        $username = $_SESSION['username'];
        $message = $_GET['message'];
        $sql = $conn->prepare("INSERT INTO xssmessage(username,message) VALUES (?,?)");
        $sql->bind_param("ss", $username, $message);
        if ($sql->execute()) {
            $error = "发布成功";
        }
    } else {
        $error = "请输入内容";
    }
}
$sqli = "SELECT * FROM xssmessage ORDER BY id DESC";
$result = mysqli_query($conn, $sqli);

include "../../../includes/header.php";
?>

<link rel=stylesheet href="../../css/xssmessage.css">
<?php
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="message-box">
        <div class="username">
            <?php echo $row['username'] //数组元素在输出时，不能加双引号
            ?>
        </div>
        <div class="message">
            <?php echo  $row['message']; ?>
        </div>
    </div>
<?php
}
?>

<?php if ($error) {
    echo "<p class='error'>" . $error . "</p>";
} ?>
<form method='GET'>
    <input type="text" name="message">
    <input type="submit" value="发布">
</form>


<?php
include "../../../includes/footer.php";
?>