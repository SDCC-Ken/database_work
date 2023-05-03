<?php
include("server_config.php");
include("checklogin.php");
$SQL="DELETE FROM booking WHERE Booking_ID = ".$_GET['BID'];
$result = mysqli_query($con,$SQL);
header("Location:club_booking.php");
?>