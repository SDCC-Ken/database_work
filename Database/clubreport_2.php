<?php include("server_config.php");include("checklogin.php");session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>College Management System - Club Page</title>
</head>
<style type="text/css">
.box{width: 100%;background: #FFF;border: solid 1px #cccccc;}
</style>
<body>
<table width="100%" border="0"><tr><td width="10%">&nbsp;</td>
<td width="80%">
<table width="100%" border="0"><tr>
<td width="11%" rowspan="2"><a href="database_index_c.php" target="_parent"><img src="icon.jpg" alt="icon.jpg" width="100" height="100" /></a></td>
<td width="89%" align="center"><font size="+6">College Management System</font></td>
</tr><tr>
<td width="89%"><font size="+2">Identity: Club Admin
( Club ID:
<?php
echo $_SESSION['CID'];
?>
 )
</font></td>
</tr><tr>
<td width="20%" height="80%" align="left" valign="top">
<iframe width="100%" height="1000" frameborder="0" scrolling="no" src="menu_c.html"></iframe>
</td>
<td width="80%" align="left" valign="top">
<font size="+1">
<p>This is a report to show the number of members in each club.</p>
<?php
$sql = ' SELECT club.club_name AS club_name ,COUNT(enroll_of_club.club_id) AS num '
	 . ' FROM club, enroll_of_club'
     . ' WHERE club.club_ID=enroll_of_club.club_id GROUP BY club.club_name'
     . ' ORDER BY COUNT(enroll_of_club.club_id),club.club_name DESC';
if (!$sql) {
    die('The query have error.');
}
$result = mysqli_query($con,$sql);
echo "<table width='100%' border='1'><tr>";
echo "
<tr>
<th align='center'>Club Name</th>
<th align='center'>Numer of member</th>
</tr>";
echo "</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td align='center'>".$row['club_name']."</td>";
	echo "<td align='center'>".$row['num']."</td>";
	echo "</tr>";
};
echo "</table>";
mysqli_close($con);
?>
</td>
</tr>
</table></td>
<td width="15%">&nbsp;</td>
</tr>
</table>
</body>
</html>
