<?php
session_start();
if(strlen($_SESSION['admin_id'])==0)
    {   
header('location:index.php');
	}
	include '../include/connection.php';
	if(isset($_POST['setup']))
	{
	$topic=$_POST['topic'];
	$review=$_POST['review'];
	$member_no=$_POST['member'];
	$group_id=rand(1000,1000000);
	$query="SELECT * FROM topic where topic='$topic'";
	$result=mysql_query($query);
	$fetch=mysql_fetch_array($result);
	if($fetch>0)
	{
		$msg="topic has already disperse";
	}
	else
	{
		$query_topic="INSERT INTO topic(topic) VALUES('$topic')";
		$result_topic=mysql_query($query_topic);
		$topic_id=mysql_insert_id();
		
		$query_group="INSERT INTO `group`(group_no) VALUES ('$group_id')";
		        $result_group=mysql_query($query_group);
				
		$query2="SELECT * FROM student WHERE disperse='0' ORDER BY RAND() LIMIT $member_no";
		$result2=mysql_query($query2);
		while($row=mysql_fetch_array($result2))
		{
			$student_id=$row['id'];
			$query3="INSERT INTO member(student_id,topic_id,group_id,review,member_no,files,view) VALUES('$student_id','$topic_id','$group_id','$review','$member_no','upload/new.docx','0')";
			$result3=mysql_query($query3);
			if($result3)
			{
				
			   $query4="UPDATE student SET disperse='1' WHERE id='$student_id'";
				$result4=mysql_query($query4);
					$msg="project setup successfully";
			}
			else{
				$msg="project not setup due to server error";
			}
		}
		
		
	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
<div class="header"><h3>PROJECT RESEARCH PAPER SHARING APPLICATION</h3></div>
<?php
						
  if(isset($msg))
	{ echo "<p align=center style=color:red;>$msg</p>";}
								
								?>
<div align="right" style="font-size:20px;padding-right:10px"><a href="logout.php">Logout</a></div>
<div class="content1">
<fieldset class="field">
<legend align="center">Admin Dashboard</legend>
<center>
<form class="loginform" method="post">
<label>Topic</label>&nbsp;&nbsp;
<input type="text" name="topic" class="inp"><br/>
<label>Review</label>&nbsp;&nbsp;
<input type="text" name="review" class="inp"><br/>
<label>Member</label>&nbsp;&nbsp;
<input type="text" name="member" class="inp"><br/>
<input type="submit" name="add" value="ADD MEMBER" class="submit">
<input type="submit" name="setup" value="PROJECT SETUP" class="submit">
<input type="submit" name="view" value="VIEW MEMBER" class="submit">
</form>
</center>
</fieldset>
</div>
<?php
if(isset($_POST['add']))
{
	header("location:add_member.php");
}
if(isset($_POST['view']))
{
	header("location:view_member.php");
}
?>
</div>
</body>
</html>
