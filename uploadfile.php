<?php
if(isset($_POST['submit']))
{
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
			$fileNameNew=uniqid(rand(),true).".".$fileActualExt;
			$fileDestination='uploads/'.$fileNameNew;
			move_uploaded_file($fileTmpName,$fileDestination);
			echo "Success";
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
?>
<html>
<head><title>Upload File</title></head>
<body>
<br>
<h1 align="center">Student Management System</h1>
<br><center>
<a href="home.php"><font size="5">Home</font></a></center><br>
<br>

<form align="center" action="uploadfile.php" method="post" enctype="multipart/form-data">
Select a File
<input type="file" id="file" name="file"><br><br>
<button type="submit" name="submit">Upload File</button><br>
</form>
</body>
</html>