<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}
$sq="select * from class";
$result=mysqli_query($conn,$sq);
if(isset($_POST['s1'])){
$id=$_POST['sid'];
$name=$_POST['nam'];
$address=$_POST['addr'];
$mobi=$_POST['mob'];
$class=$_POST['cls'];
$file=$_FILES['file'];
//print_r($file);
$fileName=$_FILES['file']['name'];
$fileType=$_FILES['file']['type'];
$fileTmpName=$_FILES['file']['tmp_name'];
$fileSize=$_FILES['file']['size'];
$fileError=$_FILES['file']['error'];
$fileExt=explode('.',$fileName);
//print_r($fileExt);
$fileActualExt=strtolower(end($fileExt));
$allowed = array('jpg','jpeg','png','pdf');
if(in_array($fileActualExt,$allowed)){
	if($fileError===0)
	{
		if($fileSize<1000000)
		{
			$fileNameNew=uniqid(rand(),false).".".$fileActualExt;
			$fileDestination='uploads/'.$fileNameNew;
			move_uploaded_file($fileTmpName,$fileDestination);
			$sql="insert into slist values ($id,'$name','$address',$mobi,'$fileNameNew','$class')";
			if(mysqli_query($conn,$sql)){
				echo "New record created successfully";
				}
					else
						{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
		}
		else
			echo "Your File is too Big";
	}
	else
		echo "There is an error uploading your file";
}
else
	echo "This type of file is not allowed";

}
//$sql="insert into slist(sid,name,address,mobile) values ("$_POST['sid']","$_POST['nam']","$_POST['addr']","$_POST['mob']")"
//echo $_POST['nam']." ".$_POST['sid']." ".$_POST['addr']." ".$_POST['mob']." ";
?>
<html>
<head><title>ADD Student</title></head>
<body bgcolor="#87CEFA">
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<a href="home.php"><font size="5">Home</font></a></center><br>
<br>
<h2 align="center">ADD STUDENT</h2>
<form align="center" action="add.php" method="post" enctype="multipart/form-data">
Student ID
<input type="text" id="sid" name="sid" required><br><br>
Name
<input type="text" id="nam" name="nam" required><br><br>
Address
<input type="text" id="adr" name="addr" required><br><br>
Mobile
<input type="text" id="mob" name="mob" required><br><br>
<input type="file" id="file" name="file"><br><br>
<label for="Class">Class:</label>
<select id="class" name="cls">
<?php
while($row = mysqli_fetch_assoc($result)){ 
echo "<option value=\"".$row['Class']."\">".$row['Class']."</option>";
}
?>
</select>
<input type="submit" value="Add Student" name="s1">
</form>
</body>
</html>