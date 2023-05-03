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
<p>This is a report to show how many lesson that lecturer teach.</p>
<?php
$sql = 'Select     a.Lecturer_ID, Lecturer_LastName, Lecturer_FirstName,
                 count(*) as  Number_of_lesson
from       lecturer a, lesson b
where      a.Lecturer_ID = b.Lecturer_ID
group by   a.Lecturer_ID, Lecturer_LastName, Lecturer_FirstName  ; ';
$result = mysqli_query($con,$sql);
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th align='center'>Lecturer ID</th>
<th align='center'>Lecturer Last Name</th>
<th align='center'>Lecturer First Name</th>
<th align='center'>Number of Lesson</th>
</tr>";
echo "</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td align='center'>".$row['Lecturer_ID']."</td>";
	echo "<td align='center'>".$row['Lecturer_LastName']."</td>";
	echo "<td align='center'>".$row['Lecturer_FirstName']."</td>";
	echo "<td align='center'>".$row['Number_of_lesson']."</td>";
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