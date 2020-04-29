<?php
session_start();
if(strlen($_SESSION['student_id'])==0)
    {   
header('location:index.php');
	}
	include 'include/connection.php';
	$id2=$_SESSION['student_id'];
	$query2="select * from member where student_id='$id2'";
	$result2=mysql_query($query2);
	$fetch2=mysql_fetch_array($result2);
	$view2=$fetch2['view'];
	$review2=$fetch2['review'];
	if($view2==$review2)
	{
		header("location:student_dashboard.php?msg=reach");
	}
	else
	{
		$query3="select * from member where student_id='$id2'";
	$result3=mysql_query($query3);
	$fetch3=mysql_fetch_array($result3);
	$view3=$fetch3['view']+1;
		$query_update="update member set view='$view3' where student_id='$id2'";
		$query_result=mysql_query($query_update);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Student  Project Preview</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
<div class="header"><h3>PROJECT RESEARCH PAPER SHARING APPLICATION</h3></div>
<div class="content1">
<fieldset class="field">
<legend align="center">Preview of the Project</legend>
<center>
<?php
$sid=$_SESSION['student_id'];
$query="SELECT * FROM member inner join topic on topic.topic_id=member.topic_id where student_id='$sid'";
$result=mysql_query($query);
$fetch=mysql_fetch_array($result);
echo "<h3 style='text-align:center;text-transform:uppercase;'>"."TOPIC: ".$fetch['topic']."</h3>";
echo "<h3>GROUP ID: ".$fetch['group_id']."&nbsp;&nbsp;&nbsp;"."REVIEW: ".$fetch['review']."&nbsp;&nbsp;&nbsp;"."VIEW: ".$fetch['view']."</h3>";
echo "<embed src='".$fetch['files']."'><br><br>";
?>
<form class="loginform" method="post">
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
