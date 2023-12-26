<?php
define('DB_HOST','localhost');
define('DB_USER','cms');
define('DB_PASS','cms');
define('DB_NAME','CanteenDB');

//Create Connection
$link = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Check COnnection
if($link->connect_error){ //if not Connection
die('Connection Failed'.$link->connect_error);//kills the Connection OR terminate execution
}
?>