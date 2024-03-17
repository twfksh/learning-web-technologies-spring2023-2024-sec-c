<?php 
    session_start();

    if (!isset($_SESSION['cur_user']) && !isset($_COOKIE['cur_user_cookie'])) {
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
                <a href="#"><?= $_SESSION['cur_user'] ?></a> |
                <a href="logout.php">Logout</a>
            </div>
        </th>
        <tr>
            <td>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="viewProfile.php">View Profile</a></li>
                    <li><a href="editProfile.php">Edit Profile</a></li>
                    <li><a href="changeProfilePicture.php">Change Profile Picture</a></li>
                    <li><a href="changePasswd.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
            <td>
            <form method="post" action="changePasswdCheck.php">
                <fieldset>
                    <legend>CHANGE PASSWORD</legend>
                    Current Password : <input type="password" name="cur-passwd"> <br>
                    <span style="color: green;">New Password :</span> <input type="password" name="new-passwd"> <br>
                    <span style="color: red">Retype New Password :</span> <input type="password" name="re-new-passwd"> <hr>
                    <input type="submit" name="submit"> 
                </fieldset>
            </form>
            </td>
        </tr>
        <tr>
            <td colspan="2"><footer style="text-align: center;">Copyright © 2024</footer></td>
        </tr>
    </table>
</body>
</html>