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
<form action="school_admin_check_same_position.php" method="post">
<p>You can find out the lecturers’ information who have the same position as another specific lecturer.</p>
<p>Lecturer ID:<input type="text" name="LID" value="<?php echo $_POST['LID']; ?>" /></p>
<p><input type="submit" name="Check" id="Check" value="GO" /></p>
</form>

<?php
if($_POST['Check']=="GO"){
$SQL="Select * from lecturer where Lecturer_Position = (Select  Lecturer_Position from lecturer where Lecturer_ID=".$_POST['LID'].");";
echo "<p>SQL query: ".$SQL."</p>";
$result1 = mysqli_query($con,$SQL);
if (!$result1) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Lecturer ID</th>
<th>LastName</th>
<th>FirstName</th>
<th>Position</th>
<th>Email</th>
<th>Telephone</th>
<th>Division</th>
</tr>";
while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['Lecturer_ID']."</td>";
	echo "<td>".$row['Lecturer_LastName']."</td>";
	echo "<td>".$row['Lecturer_FirstName']."</td>";
	echo "<td>".$row['Lecturer_Position']."</td>";
	echo "<td>".$row['Lecturer_Email']."</td>";
	echo "<td>".$row['Lecturer_Telephone']."</td>";
	echo "<td>".$row['Division']."</td>";
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