<?php
include("server_config.php");
include("checklogin.php");
$SQL="Delete from student Where Student_ID = '".$_GET['SID']."';";
$result = mysqli_query($con,$SQL);
header("Location:school_admin_show_student.php");
?>
