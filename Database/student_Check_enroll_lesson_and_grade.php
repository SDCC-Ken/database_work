<?php include("server_config.php");include("checklogin.php");session_start();?>
<?php
$SQL1 =  "SELECT Lesson_Code FROM lesson WHERE Lesson_code = '".$_POST['LC']."'";
if ($result1=mysqli_query($con,$SQL1))
	$rowcount1=mysqli_num_rows($result1);
if($_POST['Check']=="GO"){
	$_SESSION['SID']=$_POST['SID'];
	if ($rowcount1 > 0) {
			$SQL4 = "INSERT INTO  enroll_of_lesson (Lesson_Code ,Student_ID)".
					"VALUES ('".$_POST['LC']."','".$_POST['SID']."')";
			if(mysqli_query($con,$SQL4)){
				$message = $message . "The student enroll this couse";
				$message = $message . "Information added:";
				$SQL5 = "SELECT * FROM enroll_of_lesson WHERE Lesson_Code = '".$_POST['LC']."'
						 AND Student_ID = '".$_POST['SID']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Your Lesson Code is ".$row['Lesson_Code']."</p>";
					$message = $message . "<p>Your Student ID is ".$row['Student_ID']."</p>";
				}
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
<?php
if($message!=NULL){
	echo "<div class='box'>";
	echo "<p align='center'><u>Insert / Modifiy result</u></p>";
	echo "<p>".$message."</p>";
	echo "You can go back to previous page to change the value.";
	echo "</div>";
}
?>
<p>It shows the lesson you enrolled</p>
<?php
echo "<p>Your Student ID is ".$_SESSION['SID']."</p>";
$SQL = "SELECT    a.Student_Name, b.Lesson_Code, Lesson_Name, Grade
		FROM       student a, lesson b, enroll_of_lesson c
		WHERE      a.Student_ID = c.Student_ID
		AND        b.Lesson_code = c.Lesson_code
		AND        a.Student_ID = '".$_SESSION['SID']."';";
echo "<p>SQL query: ".$SQL."</p>";
$result = mysqli_query($con,$SQL);
if (!$result) 
    echo "Query ERROR!";
if($result = mysqli_query($con,$SQL)){
	echo "<table width='100%' border='1'><tr>";
	echo "<tr>
	<th align='center'>Student Name</th>
	<th align='center'>Lesson Code</th>
	<th align='center'>Lesson Name</th>
	<th align='center'>Grade</th>
	</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td align='center'>".$row['Student_Name']."</td>";
	echo "<td align='center'>".$row['Lesson_Code']."</td>";
	echo "<td align='center'>".$row['Lesson_Name']."</td>";
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