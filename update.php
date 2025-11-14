<?php
$conn=mysqli_connect('localhost','root','','php1');
if (!$conn) {
	die("Connection is failed".mysqli_connect_error());
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$result=mysqli_query($conn,"SELECT * FROM php1 WHERE id='$id'");
	$row=mysqli_fetch_assoc($result);
}
if(isset($_POST['update'])){
	 $number=$_POST['number'];
    $username=$_POST['username'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $province=$_POST['province'];
    $sql="UPDATE php1 set number='$number',username='$username',lastname='$lastname',gender='$gender' ,province='$province' WHERE id='$id'";
    if (mysqli_query($conn,$sql)) {
    	header('location:dashboard1.php');
    }else{
    	echo "update is failed".mysqli_error($conn);
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
<label>id</label>
<input type="id" name="id" value="<?php echo $row['id'];?>"><br>
<label>Phone Number</label><br>
<input type="number" name="number" placeholder="enter Phone Number" value="<?php echo $row['number'];?>"><br>
<label>First Name</label><br>
<input type="text" name="username" placeholder="enter First Name" value="<?php echo $row['username'];?>"><br>
<label>Last Name</label><br>
<input type="text" name="lastname" placeholder="enter Last Name" value="<?php echo $row['lastname'];?>"><br>
<label>Gender<label><br>
	<select name="gender" value="<?php echo $row['gender'];?>">
		<option value="male">male</option>
		<option value="female">female</option>
	</select><br>
	<label>province</label><br>
	<input type="text" name="province" placeholder="enter province" value="<?php echo $row['province'];?>"><br><br>
	<input type="submit" name="update" value="update"><br>
</form>

</body>
</html>