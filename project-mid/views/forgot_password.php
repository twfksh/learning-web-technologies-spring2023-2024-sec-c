<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | OpenCrowd</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once('navbar.php'); ?>

    <form style="margin: auto; width: 50%;" method="POST" action="../controllers/auth.php">
        <fieldset>
            <legend>Forgot Password</legend>
            <label for="username">Username</label> <br>
            <input type="text" name="username"> <br> <hr>
            <input type="submit" name="submit">
        </fieldset>
    </form>
</body>
</html>
