<?php
include("server_config.php");
include("checklogin.php");
$SQL="Delete from enroll_of_lesson Where  Student_ID = '".$_GET['SID']."' and Lesson_code = '".$_GET['LCode']."'";
$result = mysqli_query($con,$SQL);
header("Location:student_show_enroll_lesson.php?SID=".$_GET['SID']);
?>