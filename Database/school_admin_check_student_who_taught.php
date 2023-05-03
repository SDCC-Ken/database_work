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
<font size="+1">College Management System</font>
</td>
</tr><tr>
<td width="89%"><font size="+2">Identity: School Admin</font></td>
</tr><tr>
<td width="20%" height="80%" align="left" valign="top">
<iframe width="100%" height="1000" frameborder="0" scrolling="no" src="menu_a.html"></iframe>
</td>
<td width="80%" align="left" valign="top">
<font size="+2">
<form action="school_admin_check_student_who_taught.php" method="post">
<p>Find out the student that is taught by a specific lecturer.</p>
<p>Lecturer ID:<input type="text" name="LID" value="<?php echo $_POST['LID']; ?>" /></p>
<p><input type="submit" name="Check" id="Check" value="GO" /></p>
</form>
<?php
if($_POST['Check']=="GO"){
$SQL="Select     distinct d.Student_ID, d.Student_Name
From      lecturer a, lesson b, enroll_of_lesson c, student d
where     a.Lecturer_ID= b.Lecturer_ID
and       b.Lesson_code= c.Lesson_code
and       c.Student_ID= d.Student_ID
and       a.Lecturer_ID =".$_POST['LID']."
Order by  Student_ID;";
$result = mysqli_query($con,$SQL);
echo "<p>SQL query: ".$SQL."</p>";
$result1 = mysqli_query($con,$SQL);
if (!$result1) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Student ID</th>
<th>Student Name</th>
</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>".$row['Student_ID']."</td>";
	echo "<td>".$row['Student_Name']."</td>";
	echo "</tr>";
};
echo "</table>";
mysqli_close($con);
};
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