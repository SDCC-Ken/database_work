<?php
include("server_config.php");
include("checklogin.php");
$SQL="Delete from lecturer where Lecturer_ID = ".$_GET['LID'];
$result = mysqli_query($con,$SQL);
header("Location:school_admin_show_lecturer.php");
?>