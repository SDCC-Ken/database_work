<?php include("server_config.php");include("checklogin.php");session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>College Management System - Student Page</title>
</head>
<style type="text/css">
.box{width: 100%;background: #FFF;border: solid 1px #cccccc;}
</style>
<body>
<table width="100%" border="0"><tr><td width="10%">&nbsp;</td><td width="80%"><table width="100%" border="0"><tr>
<td width="11%" rowspan="2"><a href="database_index_s.php" target="_parent"><img src="icon.jpg" alt="icon.jpg" width="100" height="100" /></a></td>
<td width="89%" align="center"><font size="+6">College Management System</font></td>
</tr><tr>
<td width="89%"><font size="+2">Identity: Student
( Student ID:
<?php
echo $_SESSION['SID'];
?>
 )
</font></td>
</tr><tr>
<td width="20%" height="80%" align="left" valign="top">
<iframe width="100%" height="700" frameborder="0" scrolling="no" src="menu_s.html"></iframe>
</td>
<td width="80%" align="left" valign="top">
<font size="+1">
<p>It is a report to show the clubs that the students have enrolled and their positions.</p>
<?php
$sql = 'SELECT     a.Student_ID, a.Student_Name, c.Club_Name, b.Position
		FROM        student a, enroll_of_club b, club c
		WHERE     a.Student_ID = b.Student_ID
		AND         b.Club_ID = c.Club_ID
		GROUP BY  a.Student_ID, Student_Name, Club_Name, Position
		ORDER BY a.Student_ID;';
$result = mysqli_query($con,$sql);
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th align='center'>Student ID</th>
<th align='center'>Student Name</th>
<th align='center'>Club Name</th>
<th align='center'>Position</th>
</tr>";
echo "</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td align='center'>".$row['Student_ID']."</td>";
	echo "<td align='center'>".$row['Student_Name']."</td>";
	echo "<td align='center'>".$row['Club_Name']."</td>";
	echo "<td align='center'>".$row['Position']."</td>";
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