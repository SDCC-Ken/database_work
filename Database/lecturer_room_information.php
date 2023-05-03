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
<font size="+1">
<form id="form1" name="form1" method="post" action="lecturer_room_information.php">
<p>Room ID:<input type="text" name="RID" value="<?php echo $_POST['RID']; ?>" /></p>
<p><input type="submit" name="Check" id="Check" value="GO" /></p>
</form>
<?php
if($_POST['Check']=="GO"){
	$SQL = "SELECT * FROM room WHERE Room_ID = '".$_POST['RID']."';";
	echo "<p>SQL query: ".$SQL."</p>";
	$result = mysqli_query($con,$SQL);
	if (!$result) 
    	echo "Query ERROR!";
	if($result = mysqli_query($con,$SQL)){
		echo "<table width='100%' border='1'><tr>";
		echo "<tr>
		<th align='center'>Room ID</th>
		<th align='center'>Seat No</th>
		<th align='center'>Computer No</th>
		<th align='center'>Project No</th>
		<th align='center'>Desk No</th>
		</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td align='center'>".$row['Room_ID']."</td>";
			echo "<td align='center'>".$row['Room_SeatNo']."</td>";
			echo "<td align='center'>".$row['Room_ComputerNo']."</td>";
			echo "<td align='center'>".$row['Room_ProjectorNo']."</td>";
			echo "<td align='center'>".$row['Room_DeskNo']."</td>";
			echo "</tr>";
		};
		echo "</table>";
	}
	else
		echo "Please check the value again.";
};
mysqli_close($con);
?>
</font>
</td>
</tr>
</table></td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>