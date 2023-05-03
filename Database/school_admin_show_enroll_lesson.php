<?php include("server_config.php");include("checklogin.php");?>
<?php
$SQL1 =  "SELECT Lesson_Code FROM lesson WHERE Lesson_code = '".$_POST['LC']."'";
$SQL2 =  "SELECT Student_ID FROM student WHERE Student_ID = '".$_POST['SID']."'";
if ($result1=mysqli_query($con,$SQL1))
	$rowcount1=mysqli_num_rows($result1);
if ($result2=mysqli_query($con,$SQL2))
	$rowcount2=mysqli_num_rows($result2);
if($_POST['Check']=="GO"){
	if ($rowcount1 > 0 && $rowcount2 > 0) {
			$SQL4 = "INSERT INTO  enroll_of_lesson (Lesson_Code ,Student_ID)".
					"VALUES ('".$_POST['LC']."','".$_POST['SID']."')";
			if(mysqli_query($con,$SQL4)){
				$message = $message . "<p>The student enroll this couse.</p>";
				$message = $message . "<p>Information added:</p>";
				$SQL5 = "SELECT * FROM enroll_of_lesson WHERE Lesson_code = '".$_POST['LC']."' AND Student_ID = '".$_POST['SID']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Lesson Code is ".$row['Lesson_Code']."</p>";
					$message = $message . "<p>Student ID is ".$row['Student_ID']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
			}
			else
				$message = $message . "The student has enroll this course already";
	}
	else
		$message = $message . "Please check the value again. Wrong Student ID or Lesson Code!";
};
?>
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
<?php
if($message!=NULL){
	echo "<div class='box'>";
	echo "<p align='center'><u>Insert / Modifiy result</u></p>";
	echo "<p>".$message."</p>";
	echo "You can go back to previous page to change the value.";
	echo "</div>";
}
?>
<p>It shows the lesson enrolled by student.</p>
<?php
$SQL="SELECT * FROM enroll_of_lesson";
echo "<p>SQL query: ".$SQL."</p>";
$result1 = mysqli_query($con,$SQL);
if (!$result1) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Lesson Code</th>
<th>Student ID</th>
<th>Delete</th>
</tr>";
while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['Lesson_Code']."</td>";
	echo "<td>".$row['Student_ID']."</td>";
	echo "<td><a href='school_admin_delete_enroll_lesson.php?LCode=".$row['Lesson_Code']."&SID=".$row['Student_ID']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
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