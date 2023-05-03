<?php
include("server_config.php");
include("checklogin.php");
$SQL="DELETE FROM enroll_of_club WHERE Club_ID = ".$_GET['cid']." AND Student_ID = '".$_GET['sid']."'";
$result = mysqli_query($con,$SQL);
header("Location:club_member.php");
?>