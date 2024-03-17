<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $email = $_POST["fpass-email"];
            if ($email == $_SESSION['user']['email']) {
                echo "You password is: {$_SESSION['user']['password']}";
                echo ", <a href='login.php'>click here</a> to login.";
                exit();
            }

            $_SESSION["fpass_error"] = "Email not found";
            header("location: forgotPasswd.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | xCompany</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <th>
            <h2 style="display: inline;">xCompany</h2>
            <div>
                <a href="home.php">Home</a>
                <a href="login.php">Login</a>
                <a href="register.php">Registration</a>
            </div>
        </th>
        <tr>
            <td>
                <form method="POST" action="">
                <fieldset>
                    <legend>FORGOT PASSWORD</legend>
                    Enter Email: <input type="email" id="email" name="fpass-email">
                    <hr>
                    <input type="submit" name="submit" value="Submit">
                </fieldset>
                </form>
            </td>
        </tr>
        <tr>
            <td><footer style="text-align: center;">Copyright © 2024</footer></td>
        </tr>
    </table>
</body>
</html>