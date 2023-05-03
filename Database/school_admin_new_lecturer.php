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
<form id="form1" name="form1" method="post" action="school_admin_show_lecturer.php">
<p align="center">New Lecturer Form</p>
<p>Last Name:<input type="text" name="LN" value="<?php echo $_POST['LN']; ?>" /></p>
<p>First Name:<input type="text" name="FN" value="<?php echo $_POST['FN']; ?>" /></p>
<p>Position:<input type="text" name="Position" value="<?php echo $_POST['Position']; ?>" /></p>
<p>E-mail:<input type="email" name="email" value="<?php echo $_POST['email']; ?>" /></p>
<p>Telephone:<input type="text" name="tel" value="<?php echo $_POST['tel']; ?>" /></p>
<p>Division:<input type="text" name="Division" value="<?php echo $_POST['Division']; ?>" /></p>
<p><input type="submit" name="Check_new" id="Check" value="GO" /></p>
</form>
</td>
</tr></table>
</td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>