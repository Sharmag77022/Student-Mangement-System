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
$name=$_POST['nam'];
$address=$_POST['addr'];
$mobi=$_POST['mob'];
$sql="update slist set name='$name',address='$address',mobile='$mobi' where sid='$id'";
if(mysqli_query($conn,$sql)){
	echo "Record modified successfully";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<html>
<head><title>Edit Student</title></head>
<body bgcolor="#87CEFA">
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<a href="home.php"><font size="5">Home</font></a></center><br><br>
<h2 align="center">EDIT STUDENT</h2>
<form align="center" action="edit.php" method="post">
Student ID
<input type="text" id="sid" name="sid"><br><br>
Name
<input type="text" id="nam" name="nam"><br><br>
Address
<input type="text" id="adr" name="addr"><br><br>
Mobile
<input type="text" id="mob" name="mob"><br><br>
<input type="submit" value="Add" name="s1"><br>
</form>
</body>
</html>