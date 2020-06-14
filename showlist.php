<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}
$sql="select * from class";
$result=mysqli_query($conn,$sql);
?>
<html>
<head><title>Student List</title></head>
<body bgcolor="#87CEFA">
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<a href="home.php"><font size="5">Home</font></a></center><br>
<br>
<h2 align="center">VIEW STUDENTS</h2>
<form align="center" action="list.php" method="GET">
<label for="Class">Class:</label>
<select id="class" name="cls">
<?php
while($row = mysqli_fetch_assoc($result)){ 
echo "<option value=\"".$row['Class']."\">".$row['Class']."</option>";
}
?>
</select><br><br>
<input type="submit" value="View Students" name="s1">
</form></form>
</body>
</html>