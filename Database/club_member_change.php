<?php include("server_config.php");include("checklogin.php");session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>College Management System - Club Page</title>
</head>
<style type="text/css">
.box{width: 100%;background: #FFF;border: solid 1px #cccccc;}
</style>
<body>
<table width="100%" border="0"><tr><td width="10%">&nbsp;</td>
<td width="80%">
<table width="100%" border="0"><tr>
<td width="11%" rowspan="2"><a href="database_index_c.php" target="_parent"><img src="icon.jpg" alt="icon.jpg" width="100" height="100" /></a></td>
<td width="89%" align="center"><font size="+6">College Management System</font></td>
</tr><tr>
<td width="89%"><font size="+2">Identity: Club Admin
( Club ID:
<?php
echo $_SESSION['CID'];
?>
 )
</font></td>
</tr><tr>
<td width="20%" height="80%" align="left" valign="top">
<iframe width="100%" height="1000" frameborder="0" scrolling="no" src="menu_c.html"></iframe>
</td>
<td width="80%" align="left" valign="top">
<font size="+1">
<p align="center">Member's position changing Form</p>
<?php
$SQL0="SELECT * FROM enroll_of_club WHERE Club_ID=".$_GET['cid']." AND Student_ID= '".$_GET['sid']."'";
$result = mysqli_query($con,$SQL0);
if (!$result) {
    die('Could not query:' . mysql_error());
}
while($row = mysqli_fetch_array($result)){
	$cid=$row['Club_ID'];
	$sid=$row['Student_ID'];
	$position=$row['Position'];
};
?>
<form id="form1" name="form1" method="post" action="club_member.php">
<p>Club ID:<?php echo $cid;?></p>
<p>Student ID:<?php echo $sid;?></p>
<p>Position:<input name="Position" type="text" value="<?php echo $position; ?>" /></p>
<input name="club_id" type="text" value="<?php echo $cid ?>"  hidden="1"/>
<input name="student_id" type="text" value="<?php echo $sid ?>"  hidden="1"/>
<p><input type="submit" name="Check_modify" id="Check" value="GO" /></p>
</form>
</font>
</td>
</tr></table>
</td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>