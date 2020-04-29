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
<title>Student Upload Project</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
<div class="header"><h3>PROJECT RESEARCH PAPER SHARING APPLICATION</h3></div>
<div class="content1">
<fieldset class="field">
<legend align="center">Upload  Project</legend>
<center>
<form class="loginform" method="post">
<input type="file" name="file" class="submit">
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
