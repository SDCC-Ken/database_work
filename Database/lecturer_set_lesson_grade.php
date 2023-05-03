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
<form id="form1" name="form1" method="post" action="lecturer_set_lesson_grade.php">
<p>Lesson Code:<input type="text" name="lcode" value="<?php echo $_POST['lcode']; ?>"  maxlength="7"/></p>
<p>Student No:<input type="text" name="sno" value="<?php echo $_POST['sno']; ?>"  maxlength="9"/></p>
<p>Grade:<input type="text" name="grade" value="<?php echo $_POST['grade']; ?>" /></p>
<p><input type="submit" name="Check" id="Check" value="GO" /></p>
</form>
<?php
$SQL1 = "SELECT * FROM enroll_of_lesson WHERE Student_ID = '".$_POST['sno']."' AND Lesson_Code = '".$_POST['lcode']."'";
$SQL2 = "SELECT * FROM lesson WHERE Lecturer_ID = '".$_SESSION['LID'];
if ($result1=mysqli_query($con,$SQL1))
	$rowcount1=mysqli_num_rows($result1);
if ($result2=mysqli_query($con,$SQL2))
	$rowcount2=mysqli_num_rows($result2);
if($_POST['Check']=="GO"){
	if($_POST['grade']!=NULL){
		if ($rowcount1 == 0 && $rowcount2 == 0)
   			echo "Please check the value again.Some value are wrong";
		else{
			$SQL4 = "UPDATE	Enroll_of_Lesson
						SET		Grade = '".$_POST['grade']."'
						WHERE	Student_ID = '".$_POST['sno']."'
						AND Lesson_Code = '".$_POST['lcode']."'";
			if(mysqli_query($con,$SQL4))
				echo "Grade set to this student";
			else
				echo "Please check the value again.";
		};
	};
	$result = mysqli_query($con,$SQL1);
	if (!$result)
    	echo "Query ERROR!";
	echo "<table width='100%' border='1'><tr>";
	echo "<tr>
	<th align='center'>Lesson Code</th>
	<th align='center'>Student ID</th>
	<th align='center'>Grade</th>
	</tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td align='center'>".$row['Lesson_Code']."</td>";
		echo "<td align='center'>".$row['Student_ID']."</td>";
		echo "<td align='center'>".$row['Grade']."</td>";
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