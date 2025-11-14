
<?php
session_start();
$conn=mysqli_connect('localhost','root','','php1');
if(!$conn){
	die('connection is failed'.mysqli_connect_error());
}
if(isset($_POST['login'])){
	$number=$_POST['number'];
	$username=$_POST['username'];
	$lastname=$_POST['lastname'];
	$gender=$_POST['gender'];
	$province=$_POST['province'];
	$sql=mysqli_query($conn,"SELECT * FROM php1 WHERE number='$number'AND username='$username'AND lastname='$lastname'AND gender='$gender'AND province='$province'");
	$result=mysqli_num_rows($sql);
	if($result>0){
		//echo "login is done";
		$_SESSION['username']=$username;
		setcookie("user",$username,time() + 3600,"/");
		header('location:dashboard1.php');
		exit();
	}else{
		echo "login is failed".mysqli_error($conn);
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
<form action="" method="POST">
<h2>login_page</h2>
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
	<input type="submit" name="login" value="login"><br>
</form>

</body>
</html>