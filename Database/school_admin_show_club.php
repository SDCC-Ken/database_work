<?php include("server_config.php");include("checklogin.php");?>
<?php
if($_POST['Check']=="GO"){
		$SQL4 = "INSERT INTO  club
			 ( Club_Name, Club_StartDate)
			 VALUES 
			 ('".$_POST['name']."', '".date('Y-m-d')."' )";
		if(mysqli_query($con,$SQL4)){
			$message = $message . "<p>The club's information has been saved.</p>";
			$message = $message . "<p>Information added:</p>";
			$SQL5 = "SELECT * FROM club WHERE Club_Name = '".$_POST['name']."'";
			$message = $message . $SQL5;
				$result = mysqli_query($con,$SQL5);
				if (!$result)
    				$message = $message . "Query ERROR!";
				while($row = mysqli_fetch_array($result)){
					$message = $message . "<p>Club ID is ".$row['Club_ID']."</p>";
					$message = $message . "<p>Club Name is ".$row['Club_Name']."</p>";
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
<p>It shows all the club's information.</p>
<?php
$SQL="SELECT * FROM club";
echo "<p>SQL query: ".$SQL."</p>";
$result1 = mysqli_query($con,$SQL);
if (!$result1) {
    echo "Query ERROR!";
}
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th>Club ID</th>
<th>Club Name</th>
<th>Start Date</th>
<th>Delete</th>
</tr>";
while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['Club_ID']."</td>";
	echo "<td>".$row['Club_Name']."</td>";
	echo "<td>".$row['Club_StartDate']."</td>";
	echo "<td><a href='school_admin_delete_club.php?CID=".$row['Club_ID']."'><img src='delete.png' width='32' height='32' alt='delete' /></a></td>";
	echo "</tr>";
};
echo "</table>";
mysqli_close($con);
?>
</td>
</tr></table>
</td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>