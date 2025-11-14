<?php
$conn=mysqli_connect('localhost','root','','php1');
session_start();
session_destroy();
header('location:create.php');
?>