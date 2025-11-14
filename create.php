<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_COOKIE['user'])){
    header("Location: loginpage.php");
    exit();
}
$conn=mysqli_connect('localhost','root','','php1');
if(isset($_POST['create'])){
    if(!$conn){
        die("Connection is failed".mysqli_connect_error());
    }
    $number=$_POST['number'];
    $username=$_POST['username'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $province=$_POST['province'];
    $sql="INSERT INTO `php1` (`number`, `username`, `lastname`, `gender`, `province`) 
          VALUES ('$number', '$username', '$lastname', '$gender', '$province')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:loginpage.php');
    }else{
        echo "create is failed".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<h2>Secure Create Account Form</h2>

<form action="" method="POST">
<label>Phone Number</label><br>
<input type="number" name="number" placeholder="enter Phone Number"><br>

<label>First Name</label><br>
<input type="text" name="username" placeholder="enter First Name"><br>

<label>Last Name</label><br>
<input type="text" name="lastname" placeholder="enter Last Name"><br>

<label>Gender<label><br>
<select name="gender">
    <option value="male">male</option>
    <option value="female">female</option>
</select><br>

<label>province</label><br>
<input type="text" name="province" placeholder="enter province"><br><br>

<input type="submit" name="create" value="create"><br>
</form>

</body>
</html>
