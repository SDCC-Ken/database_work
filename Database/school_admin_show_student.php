<?php include("server_config.php");include("checklogin.php");?>
<?php
if($_POST['Check_new']=="GO"){
	$SQL4 = "INSERT INTO student(Student_ID, Student_Name, Student_Sex, Student_Age, Contact_no) VALUE
			('".$_POST['SID']."', '".$_POST['name']."', '".$_POST['sex']."', ".$_POST['age'].", '".$_POST['cno']."')";
	if(mysqli_query($con,$SQL4)){
		$message = $message ."<p>The Student's information has been saved.</p>";
		$message = $message . "<p>Information added:</p>";
		$SQL5 = "SELECT * FROM student WHERE Student_ID = '".$_POST['SID']."'";
		$result = mysqli_query($con,$SQL5);
		while($row = mysqli_fetch_array($result)){
			$message = $message . "<p>Student ID is ".$row['Student_ID']."</p>";
			$message = $message . "<p>Name is ".$row['Student_name']."</p>";
			$message = $message . "<p>Sex is ".$row['Student_Sex']."</p>";
			$message = $message . "<p>Age is ".$row['Student_Age']."</p>";
			$message = $message . "<p>Contact No is ".$row['Contact_No']."</p>";
		};
		$message = $message . "<p>Please check the value is correct or not.</p>";
	}
	else{
		$message = $message . "Please check the value.";
	};		
};
if($_POST['Check_modifiy']=="GO"){
			$SQL4 = "Update student 
						set Student_Name = '".$_POST['name']."',
    	       			Student_Sex = '".$_POST['sex']."',
    					Student_Age = ".$_POST['age'].",
    					Contact_no = ".$_POST['cno']."
						Where Student_ID = '".$_POST['SID']."'";
		if(mysqli_query($con,$SQL4)){
			$message = $message . "<p>The Student's information has been changed.</p>";
			$message = $message . "<p>Information changed to:</p>";
				$SQL5 = "SELECT * FROM student Where Student_ID = '".$_POST['SID']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Student ID is ".$row['Student_ID']."</p>";
					$message = $message . "<p>Student Name is ".$row['Student_name']."</p>";
					$message = $message . "<p>Student Sex is ".$row['Student_Sex']."</p>";
					$message = $message . "<p>Student Age is ".$row['Student_Age']."</p>";
					$message = $message . "<p>Student Contact No is ".$row['Contact_No']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
		}
		else
			$message = $message . "Please check the value.";
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
<p>It shows the student's information.</p>
<?php
$SQL="SELECT * FROM student ORDER BY Student_ID";
echo "<p>SQL query: ".$SQL."</p>";
$result1 = mysqli_query($con,$SQL);
if (!$result1) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Student ID</th>
<th>Name</th>
<th>Sex</th>
<th>Age</th>
<th>Contact No</th>
<th>Modifiy</th>
<th>Delete</th>
</tr>";
while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['Student_ID']."</td>";
	echo "<td>".$row['Student_name']."</td>";
	echo "<td>".$row['Student_Sex']."</td>";
	echo "<td>".$row['Student_Age']."</td>";
	echo "<td>".$row['Contact_No']."</td>";
	echo "<td><a href='school_admin_change_student.php?SID=".$row['Student_ID']."'><img src='pencil.png' width='32' height='32' alt='modifiy' /></a></td>";
	echo "<td><a href='school_admin_delete_student.php?SID=".$row['Student_ID']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
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