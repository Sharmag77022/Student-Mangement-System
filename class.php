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
$class=$_POST['cls'];
$sql="insert into class values ('$class')";
if(mysqli_query($conn,$sql)){
	echo "Course added successfully";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<html>
<head><title>Add Course</title></head>
<body bgcolor="#87CEFA">
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<a href="home.php"><font size="5">Home</font></a></center><br>
<br>
<h2 align="center">Add Course</h2>
<form align="center" action="class.php" method="post">
Course
<input type="text" id="class" name="cls"><br><br>
<input type="submit" value="Add" name="s1"><br>
</form>
</body>
</html>