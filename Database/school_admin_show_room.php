<?php include("server_config.php");include("checklogin.php");?>
<?php
if($_POST['Check']=="GO"){
			$SQL4 = "INSERT INTO  room 
			(Room_ID , Room_SeatNo, Room_ComputerNo, Room_ProjectorNo, Room_DeskNo )
			VALUES
			('".$_POST['RID']."', ".$_POST['rsno'].", ".$_POST['rcno'].", ".$_POST['rpno'].",".$_POST['rdno'].")";
		if(mysqli_query($con,$SQL4)){
			$message = $message . "<p>The Room's information has been saved.</p>";
			$message = $message . "<p>Information changed to:</p>";
			$SQL5 = "SELECT * FROM room WHERE Room_ID = '".$_POST['RID']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Room ID is ".$row['Room_ID']."</p>";
					$message = $message . "<p>The number of seat is ".$row['Room_SeatNo']."</p>";
					$message = $message . "<p>The number of computer is ".$row['Room_ComputerNo']."</p>";
					$message = $message . "<p>The number of projector is ".$row['Room_ProjectorNo']."</p>";
					$message = $message . "<p>The number od desks is ".$row['Room_DeskNo']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
		}
		else
			$message = $message . "Please check the value.";
};
?>
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
if($message!=NULL){
	echo "<div class='box'>";
	echo "<p align='center'><u>Insert / Modifiy result</u></p>";
	echo "<p>".$message."</p>";
	echo "You can go back to previous page to change the value.";
	echo "</div>";
}
?>
<p>It shows room's information</p>
<?php
$SQL="SELECT * FROM room";
echo "<p>SQL query: ".$SQL."</p>";
$result1 = mysqli_query($con,$SQL);
if (!$result1) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Room ID</th>
<th>Seat number</th>
<th>Computer Number</th>
<th>Projector Number</th>
<th>Desk Number</th>
<th>Delete</th>
</tr>";
while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['Room_ID']."</td>";
	echo "<td>".$row['Room_SeatNo']."</td>";
	echo "<td>".$row['Room_ComputerNo']."</td>";
	echo "<td>".$row['Room_ProjectorNo']."</td>";
	echo "<td>".$row['Room_DeskNo']."</td>";
	echo "<td><a href='school_admin_delete_room.php?RID=".$row['Room_ID']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
	echo "</tr>";
};
echo "</table>";
mysqli_close($con);
?></font>
</td>
</tr></table>
</td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>