<?php
require('./includes/config.php');

if (isset($_SESSION['userLoggedIn'])) :
    $userLoggedIn = $_SESSION['userLoggedIn'];
else :
    header("Location: register.php");
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Spotify Clone</title>
</head>

<body>
    Index Page
</body>

</html>