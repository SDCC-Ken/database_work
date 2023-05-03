<?php include("server_config.php");include("checklogin.php");session_start();?>
<?php
if($_POST['Check_new']=="GO"){
	$SQL1 =  "SELECT Student_ID FROM student WHERE Student_ID = '".$_POST['s_no']."'";
	$SQL2 =  "SELECT Club_ID FROM club WHERE Club_ID = ".$_POST['c_id'];
	if ($result1=mysqli_query($con,$SQL1))
		$rowcount1=mysqli_num_rows($result1);
	if ($result2=mysqli_query($con,$SQL2))
		$rowcount2=mysqli_num_rows($result2);
	if($rowcount1>0 && $rowcount2>0){
		$SQL3="INSERT INTO enroll_of_club(Club_ID, Student_ID, Position, Enroll_date) VALUE (".$_POST['c_id'].",'".$_POST['s_no']."','Member','".date('Y-m-d')."')";
		if(mysqli_query($con,$SQL3)){
			$message = $message . "The record have been saved.";
			$SQL5 = "SELECT * 
					FROM enroll_of_club, student
					WHERE enroll_of_club.Student_ID = student.Student_ID
					AND enroll_of_club.Club_ID = ".$_POST['c_id']."
					AND enroll_of_club.Student_ID =  '".$_POST['s_no']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>New member's student ID is ".$row['Student_ID']."</p>";
					$message = $message . "<p>New member's student name is ".$row['Student_name']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
		}
		else
			$message = $message . "Please check the value again.";
	}
	else{
		$message = $message . "No such Student or club!";
	};
};
if($_POST['Check_modify']=="GO"){
	$SQL1 = "UPDATE enroll_of_club SET ".
			"Position = '".$_POST['Position']."' ".
			"WHERE Student_ID = '".$_POST['student_id']."' ".
			"AND Club_ID = ".$_POST['club_id']; 
	if(mysqli_query($con,$SQL1))
		$message = $message . "The Position has been changed";
	else
		$message = $message . "Please check the value again.";
};
?>
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
if($message!=NULL){
	echo "<div class='box'>";
	echo "<p align='center'><u>Insert / Modifiy result</u></p>";
	echo "<p>".$message."</p>";
	echo "You can go back to previous page to change the value.";
	echo "</div>";
}
?>
<p>You can check all the member of your club in here.</p>
<?php
$SQL1="SELECT * FROM enroll_of_club WHERE Club_ID = ".$_SESSION['CID']." ORDER BY Enroll_date, Student_ID";
echo "<p>SQL query: ".$SQL1."</p>";
$result1 = mysqli_query($con,$SQL1);
if (!$result1) 
    echo "Query ERROR!";
$SQL2="SELECT Club_Name FROM club WHERE Club_ID = ".$_SESSION['CID'];
$result2 = mysqli_query($con,$SQL2);
if (!$result2) 
    echo "Query ERROR!";
while($row = mysqli_fetch_array($result2))
	echo $row['Club_Name']." Club";
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Student ID</th>
<th>Position</th>
<th>Enroll Date</th>
<th>Modifiy</th>
<th>Delete</th>
</tr>";
echo "</tr>";
while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['Student_ID']."</td>";
	echo "<td>".$row['Position']."</td>";
	echo "<td>".$row['Enroll_date']."</td>";
	echo "<td><a href='club_member_change.php?sid=".$row['Student_ID']."&cid=".$row['Club_ID']."'><img src='pencil.png' width='32' height='32' alt='modifiy' /></a></td>";
	echo "<td><a href='club_member_delete.php?sid=".$row['Student_ID']."&cid=".$row['Club_ID']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
	echo "</tr>";
};
echo "</table>";
mysqli_close($con);
?>
</font>
</td>
</tr></table>
</td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>