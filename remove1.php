<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}
$id=$_GET['sid'];
$class=$_GET['cls'];
$sql1="select PHOTO from slist where sid='$id'";
$sql="delete from slist where sid='$id'";

if($result=mysqli_query($conn,$sql1)){
	$row = mysqli_fetch_assoc($result);
	$path='uploads/'.$row[PHOTO];
	if(mysqli_query($conn,$sql)){
		unlink($path);
		header('location:list.php?cls='.$class.'&s1=View+Students');
	}
	else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}

?>
