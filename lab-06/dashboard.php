<?php 
    session_start();

    if (!isset($_SESSION["users"])) {
        header("location: login.php");
        exit();
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
            padding: 10px;
        }
    </style>
</head>
<body>
    <table>
        <th colspan="2">
            <h2 style="display: inline;">xCompany</h2>
            <div>
                Logged in as, 
                <a href="#">User</a> |
                <a href="#">Logout</a>
            </div>
        </th>
        <tr>
            <td>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li><a href="">View Profile</a></li>
                    <li><a href="">Edit Profile</a></li>
                    <li><a href="">Change Profile Picture</a></li>
                    <li><a href="">Change Password</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            </td>
            <td><h3>Welcome, <?="User"?></h3></td>
        </tr>
        <tr>
            <td colspan="2"><footer style="text-align: center;">Copyright © 2024</footer></td>
        </tr>
    </table>
</body>
</html>