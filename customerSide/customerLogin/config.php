<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'cms');
define('DB_PASS', 'cms');
define('DB_NAME', 'CanteenDB'); // Updated database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
