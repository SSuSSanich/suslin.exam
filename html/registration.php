<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg</title>
</head>
<body>
    <form method="POST" action="registration.php">
        <div><input type="email" name="email" placeholder="Email"></div>
        <div><input type="text" name="login" placeholder="Login"></div>
        <div><input type="password" name="password" placeholder="Password"></div>
        <button type="submit" id="myButton" name="submit">Next</button>
    </form>
</body>
</html>

<?php
require_once('db.php');
if (isset($_COOKIE['User'])) {
    header("Location: login.php");
}

$link = mysqli_connect('db', 'root', 'root', 'db');


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $pass = $_POST['password'];


    if (!$email || !$username || !$pass)
        die("There are empty spaces");

    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$pass')";

    if (!mysqli_query($link, $sql)) {
        echo "The user wasn't added";
    } else {
        header("Location: login.php");
    }
    
}


?>
