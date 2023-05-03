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
<p>This is a report to show the personal and contact information of each club's chairperson.</p>
<?php
	$SQL2 = "SELECT enroll_of_club.Student_ID AS SID, student.student_name AS Sname, student.student_sex AS Ssex,".
			" student.Contact_no AS Scno, enroll_of_club.Position AS SP, ".
			" club.Club_Name AS CName ".
			"FROM club, student, enroll_of_club ".
			"WHERE enroll_of_club.Student_ID=student.Student_ID " .
			"AND enroll_of_club.club_ID=club.club_ID ".
			"AND enroll_of_club.position = 'Chairperson' ORDER BY club.Club_ID";
	$result2 = mysqli_query($con,$SQL2);
	echo "<table width='100%' border='1'><tr>";
	echo "
	<tr>
	<th>Club Name</th>
	<th>Student ID</th>
	<th>Student Name</th>
	<th>Student Sex</th>
	<th>Student Contact No</th>
	<th>Student Position</th>
	</tr>";
	echo "</tr>";
	while($row = mysqli_fetch_array($result2)){
		echo "<tr>";
		echo "<td>".$row['CName']."</td>";
		echo "<td>".$row['SID']."</td>";
		echo "<td>".$row['Sname']."</td>";
		echo "<td>".$row['Ssex']."</td>";
		echo "<td>".$row['Scno']."</td>";
		echo "<td>".$row['SP']."</td>";
		echo "</tr>";
	};
	echo "</table>";
	mysqli_close($con);
?>
</font>
</td></tr></table>
</td>
<td width="15%">&nbsp;</td>
</tr>
</table>
</body>
</html>