<?php include("server_config.php");include("checklogin.php");?>
<?php
$SQL4 =  "SELECT Lecturer_ID FROM lecturer WHERE Lecturer_ID = ".$_POST['LID'];
if ($result4=mysqli_query($con,$SQL4))
	$rowcount4=mysqli_num_rows($result4);
if($_POST['Check_new']=="GO"){
	if ($rowcount4 > 0) {
			$SQL5 = "INSERT INTO  lesson 
					(Lesson_Code ,Lesson_Name, Lesson_Division, Lesson_Categories, Lesson_Medium, Lecturer_ID)
					VALUES
					('".$_POST['LCode']."','".$_POST['LN']."','".$_POST['LD']."',
			 		'".$_POST['LC']."' ,'".$_POST['LM']."',".$_POST['LID'].")";
			if(mysqli_query($con,$SQL5)){
				$message = $message . "<p>The lesson information has been saved.</p>";
				$message = $message . "<p>Information added:</p>";
				$SQL5 = "SELECT * FROM lesson Where Lesson_code = '".$_POST['LCode']."';";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Lesson Code is ".$row['Lesson_Code']."</p>";
					$message = $message . "<p>Lesson Name is ".$row['Lesson_Name']."</p>";
					$message = $message . "<p>Lesson Division is ".$row['Lesson_Division']."</p>";
					$message = $message . "<p>Lesson Categories is ".$row['Lesson_Categories']."</p>";
					$message = $message . "<p>Lesson Medium is ".$row['Lesson_Medium']."</p>";
					$message = $message . "<p>Leecturer ID is ".$row['Lecturer_ID']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
		}
			else
				$message = $message . "The lesson is added already.";
	}
	else
		$message = $message . "Please check the value again. Wrong Lecturer ID !";
};
if($_POST['Check_modify']=="GO"){
	if ($rowcount4 > 0) {
			$SQL5 = "Update lesson
					set     Lesson_Name = '".$_POST['LN']."',
    				Lesson_Division = '".$_POST['LD']."',
    				Lesson_Categories = '".$_POST['LC']."',
    				Lesson_Medium = '".$_POST['LM']."',
    				Lecturer_ID = ".$_POST['LID']."
					Where Lesson_code = '".$_POST['LCode']."';";
			if(mysqli_query($con,$SQL5)){
				$message = $message . "<p>The lesson information has been changed.</p>";
				$message = $message . "<p>Information changed to:</p>";
				$SQL5 = "SELECT * FROM lesson Where Lesson_code = '".$_POST['LCode']."';";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Lesson Code is ".$row['Lesson_Code']."</p>";
					$message = $message . "<p>Lesson Name is ".$row['Lesson_Name']."</p>";
					$message = $message . "<p>Lesson Division is ".$row['Lesson_Division']."</p>";
					$message = $message . "<p>Lesson Categories is ".$row['Lesson_Categories']."</p>";
					$message = $message . "<p>Lesson Medium is ".$row['Lesson_Medium']."</p>";
					$message = $message . "<p>Leecturer ID is ".$row['Lecturer_ID']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
			}
			else
				$message = $message . "Please check the value again.";
	}
	else
		$message = $message . "Please check the value again. Wrong Lecturer ID !";
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
<p>It shows the lesson's information.</p>
<?php
$SQL="SELECT * FROM lesson";
echo "<p>SQL query: ".$SQL."</p>";
$result1 = mysqli_query($con,$SQL);
if (!$result1) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Lesson Code</th>
<th>Lesson Name</th>
<th>Lesson Division</th>
<th>Lesson Categories</th>
<th>Lesson Medium</th>
<th>Lecturer ID</th>
<th>Modifiy</th>
<th>Delete</th>
</tr>";
while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['Lesson_Code']."</td>";
	echo "<td>".$row['Lesson_Name']."</td>";
	echo "<td>".$row['Lesson_Division']."</td>";
	echo "<td>".$row['Lesson_Categories']."</td>";
	echo "<td>".$row['Lesson_Medium']."</td>";
	echo "<td>".$row['Lecturer_ID']."</td>";
	echo "<td><a href='school_admin_change_lesson.php?LCODE=".$row['Lesson_Code']."'><img src='pencil.png' width='32' height='32' alt='modifiy' /></a></td>";
	echo "<td><a href='school_admin_delete_lesson.php?LCODE=".$row['Lesson_Code']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
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