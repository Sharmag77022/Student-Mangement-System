<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}
if(isset($_GET['s1']))
{
$class=$_GET['cls'];
$sql="select * from slist where Class='$class'";
$result=mysqli_query($conn,$sql);
}?>
<html>
<head><title>Student List</title></head>
<body bgcolor="#87CEFA">
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<br><a href="home.php"><font size="5">Home</font></a>
<br></center>
<table border="1" align="center">
<tr><th>SID</th>
<th>NAME</th>
<th>ADDRESS</th>
<th>MOBILE</th>
<th>Image</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
echo "<tr><td>". $row['SID']."</td>"."<td>".$row['NAME']."</td>". "<td>".$row['ADDRESS']."</td>"."<td>".$row['MOBILE'].
"</td><td><img height=\"50\" width=\"50\" src=uploads/".$row['PHOTO']." alt=\"image\"></td>
<td><a style=\"text-decoration:none;color:red\" href=\"remove1.php?sid=".$row['SID']."&cls=".$row['Class']."\">Remove </a></td>
<td><a style=\"text-decoration:none;color:blue\" href=\"edit1.php?sid=".$row['SID']."\">&nbsp;Edit &nbsp;</a></td></tr>"."<br>";
}
?>
<!--http://localhost/sanjeev/add.php?sid=111&nam=sanjeeb&addr=jyotisar&mob=6343253234&file=&s1=Add+Student
--></table>

</body>
</html>