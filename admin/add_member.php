<?php
session_start();
if(strlen($_SESSION['admin_id'])==0)
    {   
header('location:index.php');
	}
	include '../include/connection.php';
	if(isset($_POST['addmember']))
{
	$matric_no=$_POST['matric_no'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "SELECT * FROM student WHERE matric_no='$matric_no'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);
			if( $num_row > 0 ) { 
		$msg="Matric number already added try to add another matric number";
		}
		 else{ 
		 $query2="INSERT INTO student(matric_no,username,password,disperse) VALUES('$matric_no','$username','$password','0')";
		 $result2=mysql_query($query2);
		 if($result2)
		 {
				$msg="Member Added Successfully";
		 }
		 else{
			 $msg="Member not Added";
		 }
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Member</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
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
<legend align="center">Add  Member</legend>
<center>
<form class="loginform" method="post">
<label>Matric No</label>&nbsp;&nbsp;
<input type="text" name="matric_no" class="inp" required><br/>
<label>Username</label>&nbsp;&nbsp;
<input type="text" name="username" class="inp" required><br/>
<label>Password</label>&nbsp;&nbsp;
<input type="text" name="password" class="inp" required><br/>
<input type="submit" name="back" value="BACK" class="submit">
<input type="submit" name="addmember" value="ADD MEMBER" class="submit">
</form>
</center>
</fieldset>
</div>
<?php
if(isset($_POST['back']))
{
	header("location:dashboard.php");
}
?>
</div>
</body>
</html>
