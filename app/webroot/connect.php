<?php
$servername = "localhost";
$username = "mbdtechng_mbdt";
$password = "7BWP&ukw6_kP";
$database = "mbdtechng_mbdtechng";


$link = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>