<?php

$host = 'localhost';
$root = 'root';
$pass = '';
$db = 'purchase_order';

$koneksi = mysqli_connect($host,$root,$pass,$db);

if(mysqli_connect_errno()){
    echo "Database error".mysqli_connect_error();
}



?>