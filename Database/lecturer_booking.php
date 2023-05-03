<?php include("server_config.php");include("checklogin.php");session_start();?>
<?php
$SQL1 =  "SELECT Room_ID FROM room WHERE Room_ID = '".$_POST['room']."'";
$SQL2 =  "SELECT Lecturer_ID FROM lecturer WHERE Lecturer_ID = ".$_POST['LID'];
$SQL3 =  "SELECT  `Room_ID` ,  `Booking_Date` ,  `Booking_STime` ,  `Booking_ETime` ".
		 "FROM  `booking` ".
		 "WHERE  `Room_ID` =  '".$_POST['room']."' ".
		 "AND  `Booking_Date` =  '".$_POST['bdate']."' ".
		 "AND  `Booking_STime`  BETWEEN '".$_POST['bstime']."' AND '".$_POST['betime']."'";
if ($result1=mysqli_query($con,$SQL1))
	$rowcount1=mysqli_num_rows($result1);
if ($result2=mysqli_query($con,$SQL2))
	$rowcount2=mysqli_num_rows($result2);
if ($result3=mysqli_query($con,$SQL3))
	$rowcount3=mysqli_num_rows($result3);
if($_POST['Check_new']=="GO"){
	$today = strtotime(date("F j, Y, g:i a"));
	$bdate = strtotime($_POST['bdate']);
	$stime = strtotime($_POST['bstime']);
	$etime = strtotime($_POST['betime']);
	if ($bdate > $today && $stime < $etime && $rowcount1 > 0 && $rowcount2 > 0) {
		if ($rowcount3 > 0)
   			$message = $message . "The Time you choose for booking room(".$_POST['room'].") is booked by someone. Please choose".
					" another time zone";
		else{
			$SQL4 = "INSERT INTO  `booking` (`Room_ID` ,`Booking_Date` ,`Booking_STime`"." ,`Booking_ETime`".
				"  ,`Lecturer_ID` ,`Booking_Purpose`) VALUE ('".
				$_POST['room']."','".$_POST['bdate']."','".$_POST['bstime']."','".
				$_POST['betime']."',".$_POST['LID'].",'".$_POST['BP']."')";
			if(mysqli_query($con,$SQL4)){
				$message = $message . "Your booinking has been confirmed.";
				$SQL5 = "SELECT * FROM booking WHERE Booking_Date = '".$_POST['bdate']."'
						 AND Booking_STime = '".$_POST['bstime']."'
						 AND Booking_ETime = '".$_POST['betime']."'
						 AND Room_ID = '".$_POST['room']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Your Booking ID is ".$row['Booking_ID']."</p>";
					$message = $message . "<p>Your Booking Date is ".$row['Booking_Date']."</p>";
					$message = $message . "<p>Your Booking start time is ".$row['Booking_STime']."</p>";
					$message = $message . "<p>Your Booking end time is ".$row['Booking_ETime']."</p>";
					$message = $message . "<p>Your Booking room is ".$row['Room_ID']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
			}
			else
				$message = $message . "Please check the value again.";
		};
	}
	else
		$message = $message . "Please check the value again.Wrong Date or Time or Room number or Lecturer ID!";
};
if($_POST['Check_modify']=="GO"){
	$today = strtotime(date("F j, Y, g:i a"));
	$bdate = strtotime($_POST['bdate']);
	$stime = strtotime($_POST['bstime']);
	$etime = strtotime($_POST['betime']);
	if ($bdate > $today && $stime < $etime && $rowcount1 > 0 && $rowcount2 > 0) {
		if ($rowcount3 > 0)
   			$message = $message . "The Time you choose for booking room(".$_POST['room'].") is booked by someone. Please choose".
					" another time zone";
		else{
			$SQL4 = "UPDATE booking SET Room_ID = '".$_POST['room']."' ,  Booking_Date = '".$_POST['bdate']."' , 
				 Booking_STime = '".$_POST['bstime']."' , Booking_ETime = '".$_POST['betime']."' , 
				 Lecturer_ID = ".$_POST['LID']." ,  Booking_Purpose = '".$_POST['BP']."' 
				 WHERE Booking_ID = ".$_POST['booking_id'];
			if(mysqli_query($con,$SQL4)){
				$message = $message . "Your booinking has been changed.";
				$SQL5 = "SELECT * FROM booking WHERE Booking_Date = '".$_POST['bdate']."'
						 AND Booking_STime = '".$_POST['bstime']."'
						 AND Booking_ETime = '".$_POST['betime']."'
						 AND Room_ID = '".$_POST['room']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Your Booking ID is ".$row['Booking_ID']."</p>";
					$message = $message . "<p>Your Booking Date is ".$row['Booking_Date']."</p>";
					$message = $message . "<p>Your Booking start time is ".$row['Booking_STime']."</p>";
					$message = $message . "<p>Your Booking end time is ".$row['Booking_ETime']."</p>";
					$message = $message . "<p>Your Booking room is ".$row['Room_ID']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
			}
			else
				$message = $message . "Please check the value again.";
		};
	}
	else
		$message = $message . "Please check the value again.Wrong Date or Time or Room number or lecturer ID!";
};
?>
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
<?php
if($message!=NULL){
	echo "<div class='box'>";
	echo "<p align='center'><u>Insert / Modifiy result</u></p>";
	echo "<p>".$message."</p>";
	echo "You can go back to previous page to change the value.";
	echo "</div>";
}
?>
<p>It shows all the booking booked by you.</p>
<?php
$SQL="SELECT * FROM booking WHERE Lecturer_ID = ".$_SESSION['LID']." ORDER BY Booking_Date ,Room_ID ,Booking_STime";
echo "<p>SQL query: ".$SQL."</p>";
$result = mysqli_query($con,$SQL);
if (!$result) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Room ID</th>
<th>Booking Date</th>
<th>Booking Start Time</th>
<th>Booking End Time</th>
<th>Booking Purpose</th>
<th>Modifiy</th>
<th>Delete</th>
</tr>";
echo "</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>".$row['Room_ID']."</td>";
	echo "<td>".$row['Booking_Date']."</td>";
	echo "<td>".$row['Booking_STime']."</td>";
	echo "<td>".$row['Booking_ETime']."</td>";
	echo "<td>".$row['Booking_Purpose']."</td>";
	echo "<td><a href='lecturer_booking_change.php?BID=".$row['Booking_ID']."'><img src='pencil.png' width='32' height='32' alt='modifiy' /></a></td>";
	echo "<td><a href='lecturer_booking_delete.php?BID=".$row['Booking_ID']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
	echo "</tr>";
};
echo "</table>";
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