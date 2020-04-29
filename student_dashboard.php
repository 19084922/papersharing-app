<?php
session_start();
if(strlen($_SESSION['student_id'])==0)
    {   
header('location:index.php');
	}
	include 'include/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Dashboard</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
<div class="header"><h3>PROJECT RESEARCH PAPER SHARING APPLICATION</h3></div>
<?php
						
  if(isset($_GET['msg']))
	{ echo "<p align=center style=color:red;>You have reach maximum limit to view and preview</p>";}
								
								?>

<div class="content">
<fieldset class="field">
<legend align="center">Student Dashboard</legend>
<center>
<form class="loginform" method="post">
<input type="submit" name="upload" value="UPLOAD" class="dsubmit"></br>
<input type="submit" name="preview" value="PREVIEW AND VIEW" class="dsubmit"></br>
<input type="submit" name="logout" value="LOGOUT" class="dsubmit">
</form>
</center>
</fieldset>
</div>
<?php
if(isset($_POST['logout']))
{
	header("location:logout.php");
}
if(isset($_POST['upload']))
{
	header("location:upload.php");
}
if(isset($_POST['preview']))
{
	header("location:preview.php");
}
?>
</div>
</body>
</html>
