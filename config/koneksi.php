<?php
$serverName = "localhost:3306";
$user = "root";
$userPassword = "root";
$databaseName = "db_kasir";

$koneksi = mysqli_connect($serverName, $user, $userPassword, $databaseName);
date_default_timezone_set('Asia/Jakarta');
