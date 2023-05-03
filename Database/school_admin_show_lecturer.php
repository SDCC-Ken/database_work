<?php include("server_config.php");include("checklogin.php");?>
<?php
if($_POST['Check_new']=="GO"){
			$SQL4 = "INSERT INTO  lecturer ".
					"(Lecturer_LastName, Lecturer_FirstName, Lecturer_Position, Lecturer_Email, ".	
					"Lecturer_Telephone, Division)".
					"VALUES".
					"( '".$_POST['LN']."', '".$_POST['FN']."', '".$_POST['Position']."' ,".
					" '".$_POST['email']."', '". $_POST['tel']."', '".$_POST['Division']."');";
		if(mysqli_query($con,$SQL4)){
			$message = $message . "<p>The Lecturer's information has been saved.</p>";
			$message = $message . "<p>Information added:</p>";
			$SQL5 = "SELECT * FROM lecturer WHERE Lecturer_Email = '".$_POST['email']."'
					AND Lecturer_Telephone = '". $_POST['tel']."'";
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Lecturer's ID is ".$row['Lecturer_ID']."</p>";
					$message = $message . "<p>Lecturer's Name is ".$row['Lecturer_LastName']." ".$row['Lecturer_FirstName']."</p>";
					$message = $message . "<p>Lecturer's Position is ".$row['Lecturer_Position']."</p>";
					$message = $message . "<p>Lecturer's E-mail is ".$row['Lecturer_Email']."</p>";
					$message = $message . "<p>Lecturer's telephone is ".$row['Lecturer_Telephone']."</p>";
					$message = $message . "<p>Lecturer's Division is ".$row['Division']."</p>";
				};
				$message = $message . "<p>Please check the value is correct or not.</p>";
		}
		else
			$message = $message . "Please check the value.";
};
if($_POST['Check_modify']=="GO"){
			$SQL4 = "Update lecturer
					SET Lecturer_LastName = '".$_POST['LN']."',
					Lecturer_FirstName = '".$_POST['FN']."',
					Lecturer_Position = '".$_POST['Position']."',
					Lecturer_Email = '".$_POST['email']."',
					Lecturer_Telephone = '".$_POST['tel']."',
					Division = '".$_POST['Division']."'
					where Lecturer_ID= ".$_POST['LID'];
		if(mysqli_query($con,$SQL4)){
			$message = $message . "<p>The Lecturer's information has been changed.</p>";
			$message = $message . "<p>Information changed to:</p>";
			$SQL5 = "SELECT * FROM lecturer WHERE Lecturer_ID = ".$_POST['LID'];
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Lecturer's ID is ".$row['Lecturer_ID']."</p>";
					$message = $message . "<p>Lecturer's Name is ".$row['Lecturer_LastName']." ".$row['Lecturer_FirstName']."</p>";
					$message = $message . "<p>Lecturer's Position is ".$row['Lecturer_Position']."</p>";
					$message = $message . "<p>Lecturer's E-mail is ".$row['Lecturer_Email']."</p>";
					$message = $message . "<p>Lecturer's telephone is ".$row['Lecturer_Telephone']."</p>";
					$message = $message . "<p>Lecturer's Division is ".$row['Division']."</p>";
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
<p>It shows the lecturer's information.</p>
<?php
$SQL="SELECT * FROM lecturer ORDER BY Lecturer_ID";
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
<th>Modifiy</th>
<th>Delete</th>
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
	echo "<td><a href='school_admin_change_lecturer.php?LID=".$row['Lecturer_ID']."'><img src='pencil.png' width='32' height='32' alt='modifiy' /></a></td>";
	echo "<td><a href='school_admin_delete_lecturer.php?LID=".$row['Lecturer_ID']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
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