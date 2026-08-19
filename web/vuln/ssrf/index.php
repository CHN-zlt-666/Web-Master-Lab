<?php
echo "<h2>Internal Api</h2>";
echo "Welcome!<br>";
if (isset($_GET['user'])) {
    echo "User:" . $_GET['user'] . "<br>";
}
echo "Time:" . date("Y-m-d H:i:s");
