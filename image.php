<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}
?>
<html>
<head><title>View Image</title></head>
<body>
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<a href="home.php"><font size="5">Home</font></a><br>
<br><a style="text-decoration:none;color:red" href="list.php"><font size="5">Student List</font></a><br></center>
<br>
<!--<form align="center" action="image.php" method="post">
Student ID
<input type="text" id="sid" name="sid"><br><br>
<input type="submit" value="View" name="s1"><br>
</form>
-->
<center>
<?php
//if(isset($_POST['s1'])){
$id=$_GET['sid'];
$sql="select PHOTO from slist where sid='$id'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	echo "<img height=\"200\" width=\"200\" src=uploads/".$row['PHOTO']." alt=\"image\">";
}
/*if(mysqli_query($conn,$sql)){
echo "<center><img align=\"center\" height=\"200\" width=\"200\" src=uploads/".$id." alt=\"image\"></center>";
	
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

?></center>
</body>
</html>