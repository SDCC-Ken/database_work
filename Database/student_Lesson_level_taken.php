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
<td width="20%" height="80%">
<iframe width="100%" height="700" frameborder="0" scrolling="no" src="menu_s.html"></iframe>
</td>
<td width="80%" align="left" valign="top">
<font size="+1">
<p>You can see the lesson level theat you enroll.</p>
<?php
echo "<p>Your Student ID is ".$_SESSION['SID'].".</p>";
$SQL4 = "SELECT    mid(Lesson_code,4,1) as Lesson_Level, Count(*) as Number_of_Lesson
FROM      student a, enroll_of_lesson b
WHERE    a.Student_ID = b. Student_ID
AND         a.Student_ID = '".$_SESSION['SID']."'
GROUP BY mid(Lesson_code,4,1);";
echo "<p>SQL query: ".$SQL4."</p>";
$result1 = mysqli_query($con,$SQL4);
if (!$result1) {
    echo "Query ERROR!";
}
if($result = mysqli_query($con,$SQL4)){
	echo "<table width='100%' border='1'>";
	echo "<tr>
	<th align='center'>Lesson Level</th>
	<th align='center'>Number of Lesson</th>
	</tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td align='center'>".$row['Lesson_Level']."</td>";
		echo "<td align='center'>".$row['Number_of_Lesson']."</td>";
		echo "</tr>";
	};
	echo "</table>";
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