<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suslin Vitaly</title>
</head>
<body>
    <?php
    if (!isset($_COOKIE['User'])) {
        ?>
        <a href="/registration.php">Registration</a>
        or
        <a href="/login.php">Login</a>
        <?php
    } else {
        echo "Hello, " . $_COOKIE['User'];
    }
    ?>
</body>
</html>