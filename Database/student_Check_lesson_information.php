<?php include("server_config.php");include("checklogin.php");session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>College Management System - Student Page
( Student ID:
<?php
echo $_SESSION['SID'];
?>
 )
</title>
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
<p>You can check the lesson's information</p>
<form id="form1" name="form1" method="post" action="student_Check_lesson_information.php">
<p>Lesson Code:<input type="text" name="Lcode" value="<?php echo $_POST['Lcode']; ?>" maxlength="7" /></p>
<p><input type="submit" name="Check" id="Check" value="GO" /></p>
</form>
<?php
$SQL1 =  "SELECT Lesson_code FROM lesson WHERE Lesson_code = '".$_POST['Lcode']."'";
if ($result1=mysqli_query($con,$SQL1))
	$rowcount1=mysqli_num_rows($result1);
if($_POST['Check']=="GO"){
	if($rowcount1 > 0 ){
		$SQL4 = "SELECT    Lesson_code, mid(Lesson_code,4,1) as Lesson_Level, Lesson_Categories, Lesson_Medium
					FROM       lesson
					WHERE    Lesson_code = '".$_POST['Lcode']."'
					ORDER BY Lesson_Code;";
		echo "<p>SQL query: ".$SQL4."</p>";
		$result1 = mysqli_query($con,$SQL4);
		if (!$result1) 
			echo "Query ERROR!";
		if($result = mysqli_query($con,$SQL4)){
			echo "<table width='100%' border='1'><tr>";
			echo "<tr>
			<th align='center'>Lesson Code</th>
			<th align='center'>Lesson Level</th>
			<th align='center'>Lesson Categories</th>
			<th align='center'>Lesson Medium</th>
			</tr>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td align='center'>".$row['Lesson_code']."</td>";
				echo "<td align='center'>".$row['Lesson_Level']."</td>";
				echo "<td align='center'>".$row['Lesson_Categories']."</td>";
				echo "<td align='center'>".$row['Lesson_Medium']."</td>";
				echo "</tr>";
			};
			echo "</table>";
		}
		else
			echo "Please check the value again.";
	}
	else
		echo "Please enter correct Lesson Code.";
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