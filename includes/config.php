<?php
ob_start();
session_start();
$time_zone = date_default_timezone_set("Asia/Karachi");
$conn = mysqli_connect("localhost", "root", "root123", "spotify_clone");

if (mysqli_connect_errno()) :
    echo "Failed to Connect:" . mysqli_connect_errno();
endif;