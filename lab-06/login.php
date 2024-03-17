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
                <form method="POST" action="auth.php">
                <fieldset>
                    <legend>LOGIN</legend>
                    User Name: <input type="text" name="username"> <br>
                    Password: <input type="password" name="password"> <hr>
                    <input type="checkbox" name="remember"> Remember me <br> <br>
                    <input type="submit" name="submit" value="Submit">
                    <a href="forgotPasswd.php">Forgot Password?</a>
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