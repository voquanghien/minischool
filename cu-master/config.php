<?php
$sDbHost = 'localhost';
$sDbName = 'login';
$sDbUser = 'root';
$sDbPwd = 'root';
$dbConn = mysqli_connect ($sDbHost, $sDbUser, $sDbPwd, $sDbName) or die ('MySQL connect failed. ' . mysqli_error())
?>
