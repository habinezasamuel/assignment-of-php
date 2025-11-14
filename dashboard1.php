<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}

if (!isset($_COOKIE['user'])) {
    header("Location: loginpage.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard.php</title>
</head>
<body>

<h2>Welcome: <?php echo $_SESSION['username']; ?></h2>

<a href="logout.php" style="padding:10px; background:green; color:white; text-decoration:none;">Logout</a>
<br><br>

<table border="1">
    <tr>
        <th>id</th>
        <th>Phone Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Province</th>
        <th colspan="2">Operation</th>
    </tr>

    <?php
    $conn=mysqli_connect('localhost','root','','php1');
    $result=mysqli_query($conn,"SELECT * FROM php1");

    while ($row=mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['number'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['lastname'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['province'];?></td>

        <td><a href="update.php?id=<?php echo $row['id'];?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</table>

</body>
</html>
