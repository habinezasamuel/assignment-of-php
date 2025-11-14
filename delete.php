<?php
 $conn=mysqli_connect('localhost','root','','php1');
 if (!$conn) {
 	die("Connection is failed" .mysqli_connect_error());
 }
 $delete=$_GET['id'];
 $sql="DELETE FROM php1 WHERE id='$delete'";
 if(mysqli_query($conn,$sql)){
 	header('location:dashboard1.php');
 }else{
 	echo "delete is failed".mysqli_error($conn);
 }
?>