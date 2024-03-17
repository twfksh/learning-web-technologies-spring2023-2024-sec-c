<?php 
    session_start();

    if (!isset($_SESSION['cur_user']) && !isset($_COOKIE['cur_user_cookie'])) {
        header("location: login.php");
        exit();
    }

    $curUser = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | xCompany</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                <a href="dashboard.php"><?= $_SESSION['cur_user'] ?></a> |
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
                <form method="post" action="changeProfilePictureCheck.php" enctype="multipart/form-data">
                <fieldset>
                    <legend>EDIT PROFILE</legend>
                    <table>
                        <tr>
                        <?php
                            $username = $curUser['username'];
                            $jpgProfilePicture = "uploads/images/{$username}.jpg";
                            $pngProfilePicture = "uploads/images/{$username}.png";

                            if (file_exists($jpgProfilePicture)) {
                                echo "<img src='{$jpgProfilePicture}' alt='Profile Picture' width='150'>";
                            } elseif (file_exists($pngProfilePicture)) {
                                echo "<img src='{$pngProfilePicture}' alt='Profile Picture' width='150'>";
                            } else {
                                echo "<i class='fa-solid fa-user-plus fa-6x'></i>";
                            }
                        ?> <br> <br>
                        <input type="file" name="profile-picture">
                        </tr>
                    </table>
                    <br>
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
