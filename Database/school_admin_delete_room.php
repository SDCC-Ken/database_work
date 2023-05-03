<?php
include("server_config.php");
include("checklogin.php");
$SQL="Delete from room where  Room_ID = '".$_GET['RID']."'";
$result = mysqli_query($con,$SQL);
header("Location:school_admin_show_room.php");
?>