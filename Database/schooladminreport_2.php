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
<p>Each club has member number</p>
<?php
$sql = 'Select    a.Lesson_code, a.Lesson_Name ,count(*) as Number_of_student
from     lesson a, enroll_of_lesson b, student c
where   	a.Lesson_Code = b.Lesson_Code   
and      	b.Student_ID = c.Student_ID             
group by  a.Lesson_code, a.Lesson_Name  
order by  a.Lesson_code desc     ';
$result = mysqli_query($con,$sql);
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th align='center'>Lesson Code</th>
<th align='center'>Lesson Name</th>
<th align='center'>Number of Student</th>
</tr>";
echo "</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td align='center'>".$row['Lesson_code']."</td>";
	echo "<td align='center'>".$row['Lesson_Name']."</td>";
	echo "<td align='center'>".$row['Number_of_student']."</td>";
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