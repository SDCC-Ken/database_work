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
<?php
$SQL0="SELECT * FROM student WHERE Student_ID = '".$_GET['SID']."'";
$result = mysqli_query($con,$SQL0);
while($row = mysqli_fetch_array($result)){
	$SID=$row['Student_ID'];
	$name=$row['Student_name'];
	$sex=$row['Student_Sex'];
	$age=$row['Student_Age'];
	$cno=$row['Contact_No'];
};
if($_POST['Check']=="GO"){
	$SID=$_POST['SID'];
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$age=$_POST['age'];
	$cno=$_POST['cno'];
};
?>
<form id="form1" name="form1" method="post" action="school_admin_show_student.php">
<p align="center">Student Changing Form</p>
<p>Student ID:<?php echo $SID; ?><input name="SID" type="text" value="<?php echo $SID; ?>"  hidden="-1" /></p>
<p>Name:<input type="text" name="name" value="<?php echo $name; ?>" /></p>
<p>Sex:<select name="sex"><option value="M"  <?php if($sex=="M")echo "selected='selected'"; ?>>M</option><option value="F" <?php if($sex=="F")echo "selected='selected'"; ?>>F</option></select></p>
<p>Age:<input type="text" name="age" value="<?php echo $age; ?>" maxlength="2" /></p>
<p>Contact No:<input type="text" name="cno" value="<?php echo $cno; ?>" maxlength="8" /></p>
<p><input type="submit" name="Check_modifiy" id="Check" value="GO" /></p>
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