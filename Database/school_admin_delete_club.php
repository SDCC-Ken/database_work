<?php
include("server_config.php");
include("checklogin.php");
$SQL="Delete from club where  Club_ID = ".$_GET['CID'];
$result = mysqli_query($con,$SQL);
header("Location:school_admin_show_club.php");
?>