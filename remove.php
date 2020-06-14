<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}
if(isset($_POST['s1'])){
$id=$_POST['sid'];
$sql="delete from slist where sid='$id'";
if(mysqli_query($conn,$sql)){
	echo "Record removed successfully";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<html>
<head><title>Remove Student</title></head>
<body>
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<a href="home.php"><font size="5">Home</font></a></center><br>
<br>
<h2 align="center">REMOVE STUDENT</h2>
<form align="center" action="remove.php" method="post">
Student ID
<input type="text" id="sid" name="sid"><br><br>
<input type="submit" value="Remove" name="s1"><br>
</form>
</body>
</html>