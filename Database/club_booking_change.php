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
<?php
$SQL0="SELECT * FROM booking WHERE Booking_ID = ".$_GET['BID'];
$result = mysqli_query($con,$SQL0);
while($row = mysqli_fetch_array($result)){
	$room=$row['Room_ID'];
	$bdate=$row['Booking_Date'];
	$bstime=$row['Booking_STime'];
	$betime=$row['Booking_ETime'];
	$CID=$row['Club_ID'];
	$BP=$row['Booking_Purpose'];
};
if($_POST['Check']=="GO"){
	$room=$_POST['room'];
	$bdate=$_POST['bdate'];
	$bstime=$_POST['bstime'];
	$betime=$_POST['betime'];
	$CID=$_POST['CID'];
	$BP=$_POST['BP'];
};
?>
<form id="form1" name="form1" method="post" action="club_booking.php">
<table width="100%" border="0"><tr>
<td width="50%">Date:<input type="date" name="bdate" value="<?php echo $bdate; ?>" /></td>
<td width="50%">Start time:<input type="time" name="bstime" value="<?php echo $bstime; ?>" /></td>
</tr><tr>
<td>End Time:<input type="time" name="betime" value="<?php echo $betime; ?>" /></td>
<td>Room_ID:<input name="room" type="text" value="<?php echo $room; ?>" /></td>
</tr><tr>
<td>Club_ID:<input name="CID" type="text" value="<?php echo $CID; ?>" /></td>
<td>Booking Purpose:<input name="BP" type="text" value="<?php echo $BP; ?>" /></td></tr></table>
<input name="booking_id" type="text" value="<?php echo $_GET['BID'] ?>"  hidden="1"/>
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