<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <div><input type="text" name="login" placeholder="Login"></div>
        <div><input type="password" name="password" placeholder="Password"></div>
        <button type="submit" id="myButton" name="submit">Next</button>
    </form>
</body>
</html>

<?php
require_once('db.php');
if (isset($_COOKIE['User'])) {
    header("Location: index.php");
}

$link = mysqli_connect('db', 'root', 'root', 'db');

if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $pass = $_POST['password'];

    if (!$username || !$pass)
        die("There are empty spaces");

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";


    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $rows = mysqli_fetch_array($result);
        $login = $rows['username'];
        setcookie("User", $login, time() + 7200);
        header("Location: index.php");
    } else {
        echo "Error Credentials are wrong";
    }
}

?>
