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
                <form method="POST" action="registrationCheck.php">
                <fieldset>
                <legend>REGISTRATION</legend>
                    Name: <input type="text" name="name"> <hr>
                    Email: <input type="email" name="email"> <hr>
                    User Name: <input type="text" name="username"> <hr>
                    Password: <input type="password" name="password"> <hr>
                    Confirm Password: <input type="password" name="confirm-password"> <hr>
                    <fieldset>
                        <legend>Gender</legend>
                        <input type="radio" id="male" name="gender" value="male"> 
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female"> 
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other"> 
                        <label for="other">Other</label>
                    </fieldset>
                    <fieldset>
                        <legend>Date of Birth</legend>
                        <input type="number" name="day" min="1" max="31" required /> /
                        <input type="number" name="month" min="1" max="12" required /> /
                        <input type="number" name="year" min="1900" max="9999" required /> (dd/mm/yyyy)
                    </fieldset> <hr>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">
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