<?php
session_start();
include("include/connection.php");
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);
			if( $num_row > 0 ) { 
		$_SESSION['student_id']=$row['id'];
		header('location:student_dashboard.php');
		}
		 else{ 
				$msg="invalid username or password";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Login</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
<div class="header"><h3>PROJECT RESEARCH PAPER SHARING APPLICATION</h3></div>
<?php
						
  if(isset($msg))
	{ echo "<p align=center style=color:red;>$msg</p>";}
								
								?>

<div class="content">
<fieldset class="field">
<legend align="center">Student Login</legend>
<center>
<form class="loginform" method="post">
<label>Username</label>&nbsp;&nbsp;
<input type="text" name="username" class="inp" required><br/>
<label>Password</label>&nbsp;&nbsp;
<input type="password" name="password" class="inp" required><br/>
<input type="submit" name="login" value="Login" class="submit">
</form>
</center>
</fieldset>
</div>
</div>
</body>
</html>
