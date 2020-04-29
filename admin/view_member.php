<?php
session_start();
if(strlen($_SESSION['admin_id'])==0)
    {   
header('location:index.php');
	}
	include '../include/connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>View Group Member</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
<div class="header"><h3>PROJECT RESEARCH PAPER SHARING APPLICATION</h3></div>
<?php
						
  if(isset($msg))
	{ echo "<p align=center style=color:red;>$msg</p>";}
								
								?>

<div class="content" id="content">
<fieldset class="field">
<legend align="center">View Group Member And Ther Topic</legend>
<center>
<form class="loginform" method="post">
<label>Group Id</label>&nbsp;&nbsp;
<select class="group" name="group">
<?php 
$cnt=1;
$query="SELECT * FROM `group`";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
?>
<option value="<?php echo $row['group_no'];?>" ><?php echo $row['group_no'];?></option>
<?php $cnt++;}?>
</select><br/>
<input type="submit" name="back" value="BACK" class="submit">
<input type="submit" name="viewmember" value="VIEW MEMBER" class="submit">
</form>
</center>
</fieldset>
</div>
<?php
if(isset($_POST['back']))
{
	header("location:dashboard.php");
}
if(isset($_POST['viewmember']))
{
	$group=$_POST['group'];
	?><table border="1" cellpadding="10" style="margin-top:10%;border-collapse:collapse;" align="center" width="70%">
	<caption><?php echo "Group Id:". $group;?></caption>
	<tr><th>S/N</th><th>MATRIC NO</th><th>TOPIC</th><th>REVIEW</th><th>VIEW</th><th>DOWNLOAD</th></tr>
	<?php
	$query="select * from member inner join student on student.id=member.student_id inner join topic on topic.topic_id=member.topic_id where group_id='$group'";
	$result=mysql_query($query);
	$sn=1;
	while($row=mysql_fetch_array($result))
	{?>
	<tr><td><?php echo $sn;?></td><td><?php echo $row['matric_no'];?></td><td><?php echo $row['topic'];?></td><td><?php echo $row['review'];?></td><td><?php echo $row['view'];?></td><td><a href="../<?php echo $row['files'];?>"><img src="dowload.png"></a></td></tr>
	
<?php $sn++;}}?>
</table>
</div>
</body>
</html>
