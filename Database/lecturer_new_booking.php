<?php include("server_config.php");include("checklogin.php");session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>College Management System - Lecturer Page</title>
</head>
<style type="text/css">
.box{width: 100%;background: #FFF;border: solid 1px #cccccc;}
</style>
<body>
<table width="100%" border="0"><tr><td width="10%">&nbsp;</td><td width="80%"><table width="100%" border="0"><tr>
<td width="11%" rowspan="2"><a href="database_index_l.php" target="_parent"><img src="icon.jpg" alt="icon.jpg" width="100" height="100" /></a></td>
<td width="89%" align="center"><font size="+6">College Management System</font></td>
</tr><tr>
<td width="89%"><font size="+2">Identity: Lecturer
( Lecturer ID:
<?php
echo $_SESSION['LID'];
?>
)
</font></td>
</tr><tr>
<td width="20%" height="80%" align="left" valign="top">
<iframe width="100%" height="1000" frameborder="0" scrolling="no" src="menu_l.html"></iframe>
</td>
<td width="80%" align="left" valign="top">
<?php
if($_POST['LID']!=NULL)
	$LID=$_POST['LID'];
else
	$LID=$_SESSION['LID'];
?>
<font size="+1">
<form id="form1" name="form1" method="post" action="lecturer_booking.php">
<p align="center">New Booking Form</p>
<table width="100%" border="0"><tr>
<td width="50%">Date:<input type="date" name="bdate" value="<?php echo $_POST['bdate']; ?>" /></td>
<td width="50%">Start time:<input type="time" name="bstime" value="<?php echo $_POST['bstime']; ?>" /></td>
</tr><tr>
<td>End Time:<input type="time" name="betime" value="<?php echo $_POST['betime']; ?>" /></td>
<td>RoomID:<input name="room" type="text" value="<?php echo $_POST['room']; ?>" /></td>
</tr><tr>
<td>Lecturer ID:<?php echo $LID; ?><input name="LID" type="text" value="<?php echo $LID; ?>" hidden="-1" /></td>
<td>Booking Purpose:<input name="BP" type="text" value="<?php echo $_POST['BP']; ?>" /></td></tr></table>
<p><input type="submit" name="Check_new" id="Check" value="GO" /></p>
</form>

</font>
</td>
</tr>
</table></td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>