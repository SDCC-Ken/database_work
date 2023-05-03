<?php include("server_config.php");include("checklogin.php");session_start();?>
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
<form id="form1" name="form1" method="post" action="lecturer_lesson_check_2.php">
<p>Lesson Categories:<select name="LC">
<?php
$SQL2="SELECT DISTINCT Lesson_Categories FROM lesson";
$result2 = mysqli_query($con,$SQL2);
while($row = mysqli_fetch_array($result2)){
	echo "<option";
	if($_POST['LC']==$row['Lesson_Categories'])
		echo " selected='selected'";
	echo ">".$row['Lesson_Categories']."</option>";
};
?></select></p>
<p><input type="submit" name="Check" id="Check" value="GO" /></p>
</form>
<?php
if($_POST['Check']=="GO"){
	$SQL = "SELECT 	Lesson_Code, Lesson_Name, Lesson_Categories
			FROM             lesson
			WHERE 	Lesson_Categories = '".$_POST['LC']."';";
	echo "<p>SQL query: ".$SQL."</p>";
	$result1 = mysqli_query($con,$SQL);
	if (!$result1) 
    	echo "Query ERROR!";
	if($result = mysqli_query($con,$SQL)){
		echo "<table width='100%' border='1'><tr>";
		echo "<tr>
		<th align='center'>Lesson Code</th>
		<th align='center'>Lesson Name</th>
		<th align='center'>Lesson Categories</th>
		</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td align='center'>".$row['Lesson_Code']."</td>";
			echo "<td align='center'>".$row['Lesson_Name']."</td>";
			echo "<td align='center'>".$row['Lesson_Categories']."</td>";
			echo "</tr>";
		};
		echo "</table>";
	}
	else
		echo "Please check the value again.";
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