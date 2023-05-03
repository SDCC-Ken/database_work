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
<form id="form1" name="form1" method="post" action="school_admin_show_room.php">
<p align="center">New Room Form</p>
<p>Room ID:<input type="text" name="RID" value="<?php echo $_POST['RID']; ?>" /></p>
<p>Room Seat No:<input type="text" name="rsno" value="<?php echo $_POST['rsno']; ?>" /></p>
<p>Room Computer No:<input type="text" name="rcno" value="<?php echo $_POST['rcno']; ?>" /></p>
<p>Room Projector No:<input type="text" name="rpno" value="<?php echo $_POST['rpno']; ?>" /></p>
<p>Room Desk No:<input type="text" name="rdno" value="<?php echo $_POST['rdno']; ?>" /></p>
<p><input type="submit" name="Check" id="Check" value="GO" /></p>
</form>
<?php
if($_POST['Check']=="GO"){
			$SQL4 = "INSERT INTO  room 
			(Room_ID , Room_SeatNo, Room_ComputerNo, Room_ProjectorNo, Room_DeskNo )
			VALUES
			('".$_POST['RID']."', ".$_POST['rsno'].", ".$_POST['rcno'].", ".$_POST['rpno'].",".$_POST['rdno'].")";
		if(mysqli_query($con,$SQL4)){
			echo "<p>The Room's information has been saved.</p>";
			echo "<p>Information changed to:</p>";
			$SQL5 = "SELECT * FROM room WHERE Room_ID = '".$_POST['RID']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				echo "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					echo "<p>Room ID is ".$row['Room_ID']."</p>";
					echo "<p>The number of seat is ".$row['Room_SeatNo']."</p>";
					echo "<p>The number of computer is ".$row['Room_ComputerNo']."</p>";
					echo "<p>The number of projector is ".$row['Room_ProjectorNo']."</p>";
					echo "<p>The number od desks is ".$row['Room_DeskNo']."</p>";
				};
				echo "<p>Please check the value is correct or not.</p>";
		}
		else
			echo "Please check the value.";
};
mysqli_close($con);
?>
</td>
</tr></table>
</td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>