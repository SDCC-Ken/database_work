<?php include("server_config.php");include("checklogin.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>College Management System - School Admin Page</title>
</head>
<style type="text/css">
.box{width: 100%;background: #FFF;border: solid 1px #cccccc;}
</style>
<body>
<table width="100%" border="0"><tr><td width="10%">&nbsp;</td>
<td width="80%">
<table width="100%" border="0"><tr>
<td width="11%" rowspan="2">
<a href="database_index_a.php" target="_parent"><img src="icon.jpg" alt="icon.jpg" width="100" height="100" /></a></td>
<td width="89%" align="center">
<font size="+6">College Management System</font>
</td>
</tr><tr>
<td width="89%"><font size="+2">Identity: School Admin</font></td>
</tr><tr>
<td width="20%" height="80%" align="left" valign="top">
<iframe width="100%" height="1000" frameborder="0" scrolling="no" src="menu_a.html"></iframe>
</td>
<td width="80%" align="left" valign="top">
<font size="+1">
<form id="form1" name="form1" method="post" action="school_admin_show_lesson.php">
<p>Lesson Code:<input type="text" name="LCode" value="<?php echo $_POST['LCode']; ?>"  maxlength="7" /></p>
<p>Lesson Name:<input type="text" name="LN" value="<?php echo $_POST['LN']; ?>"  /></p>
<p>Lesson Division:<select name="LD">
<?php
$SQL1="SELECT DISTINCT Lesson_Division FROM lesson";
$result1 = mysqli_query($con,$SQL1);
while($row = mysqli_fetch_array($result1)){
	echo "<option";
	if($_POST['LD']==$row['Lesson_Division'])
		echo " selected='selected'";
	echo ">".$row['Lesson_Division']."</option>";
};
?>
</select></p>
<p>Lesson Categories:<select name="LC">
<?php
$SQL2="SELECT DISTINCT Lesson_Categories FROM lesson";
$result2 = mysqli_query($con,$SQL2);
while($row = mysqli_fetch_array($result2)){
	echo "<option";
	if($_POST['LC']==$row['Lesson_Categories'])
		echo " selected='selected'";
	echo ">".$row['Lesson_Categories']."</option>";
};
?></select></p>
<p>Lesson Medium:<select name="LM">
<?php
$SQL3="SELECT DISTINCT Lesson_Medium FROM lesson";
$result3 = mysqli_query($con,$SQL3);
while($row = mysqli_fetch_array($result3)){
	echo "<option";
	if($_POST['LM']==$row['Lesson_Medium'])
		echo " selected='selected'";
	echo ">".$row['Lesson_Medium']."</option>";
};
?></select></p>
<p>Lecturer ID:<input type="text" name="LID" value="<?php echo $_POST['LID']; ?>"  /></p>
<p><input type="submit" name="Check_new" id="Check" value="GO" /></p>
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