<?php
include("server_config.php");
include("checklogin.php");
$SQL="Delete from lesson where Lesson_code = '".$_GET['LCODE']."'";
$result = mysqli_query($con,$SQL);
header("Location:school_admin_show_lesson.php");
?>