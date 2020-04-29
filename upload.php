<?php
session_start();
if(strlen($_SESSION['student_id'])==0)
    {   
header('location:index.php');
	}
	include 'include/connection.php';
	if(isset($_POST['upload']))
{
	$File = $_FILES['files']['name'];
		$tmp_dir = $_FILES['files']['tmp_name'];
		$fileSize = $_FILES['files']['size'];
		$upload_dir = 'upload/'; // upload directory
	
			$fileExt = strtolower(pathinfo($File,PATHINFO_EXTENSION)); // get image extension
			//$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
			// rename uploading image
			$userfile = rand(1000,1000000).".".$fileExt;
			move_uploaded_file($tmp_dir,$upload_dir.$userfile);
			$student_id=$_SESSION['student_id'];
			$student_file="upload/".$userfile;
			$update_query="update member set files='$student_file' where student_id='$student_id'";
			$query=mysql_query($update_query);
			if($query)
	{
		$msg="file upload sucessfully";
		
	}
	else
	{
		
		$msg="file not upload";
	}
		
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Upload Project</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
<div class="header"><h3>PROJECT RESEARCH PAPER SHARING APPLICATION</h3></div>
<?php
						
  if(isset($msg))
	{ echo "<p align=center style=color:red;>$msg</p>";}
								
								?>

<div class="content1">
<fieldset class="field">
<legend align="center">Upload  Project</legend>
<center>
<form class="loginform" method="post" enctype="multipart/form-data">
<input type="file" name="files" class="submit">
<input type="submit" name="upload" value="Upload" class="submit"><br><br>
<input type="submit" name="back" value="BACK" class="submit">
</form>
</center>
</fieldset>
</div>
<?php
if(isset($_POST['back']))
{
	header("location:student_dashboard.php");
}
?>
</div>
</body>
</html>
