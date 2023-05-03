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
if($_POST['Check']=="GO"){
	$LN=$_POST['LN'];
	$FN=$_POST['FN'];
	$Position=$_POST['Position'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$Division=$_POST['Division'];
}else{
$SQL0='SELECT * FROM lecturer WHERE Lecturer_ID = '.$_GET['LID'].' LIMIT 0, 100 ';
$result0 = mysqli_query($con,$SQL0);
while($row = mysqli_fetch_array($result0)){
	$LID=$row['Lecturer_ID'];
	$LN=$row['Lecturer_LastName'];
	$FN=$row['Lecturer_FirstName'];
	$Position=$row['Lecturer_Position'];
	$email=$row['Lecturer_Email'];
	$tel=$row['Lecturer_Telephone'];
	$Division=$row['Division'];
};
};
?>
<form id="form1" name="form1" method="post" action="school_admin_show_lecturer.php">
<p align="center">Lecturer Changing Form</p>
<p>Lecturer ID: <?php echo $LID;?><input name="LID" type="text" value="<?php echo $LID; ?>"  hidden="-1" /></p>
<p>Last Name:<input type="text" name="LN" value="<?php echo $LN; ?>" /></p>
<p>First Name:<input type="text" name="FN" value="<?php echo $FN; ?>" /></p>
<p>Position:<input type="text" name="Position" value="<?php echo $Position; ?>" /></p>
<p>E-mail:<input type="email" name="email" value="<?php echo $email; ?>" /></p>
<p>Telephone:<input type="text" name="tel" value="<?php echo $tel; ?>" /></p>
<p>Division:<input type="text" name="Division" value="<?php echo $Division; ?>" /></p>
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