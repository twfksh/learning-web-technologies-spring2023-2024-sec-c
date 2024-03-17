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
                <form method="post" action="editProfileCheck.php">
                <fieldset>
                    <legend>EDIT PROFILE</legend>
                    <table>
                        <tr>
                            <td>
                                Name:           <input type="text" name="name" value=<?= $curUser['name'] ?>>    <hr>
                                Email:          <input type="email" name="email" value=<?= $curUser['email'] ?>>   <hr>
                                Gender:         <input type="radio" id="male" name="gender" value="male" <?php echo ($curUser['gender'] === 'male') ? 'checked' : ''; ?> /> 
                                                <label for="male">Male</label>
                                                <input type="radio" id="female" name="gender" value="female" <?php echo ($curUser['gender'] === 'female') ? 'checked' : ''; ?> /> 
                                                <label for="female">Female</label>
                                                <input type="radio" id="other" name="gender" value="other" <?php echo ($curUser['gender'] === 'other') ? 'checked' : ''; ?> /> 
                                                <label for="other">Other</label>  <hr>
                                Date of Birth:  <input type="text" name="day" value="<?= $curUser['dob'][0] ?>" size="2"> /
                                                <input type="text" name="month" value="<?= $curUser['dob'][1] ?>" size="2"> /
                                                <input type="text" name="year" value="<?= $curUser['dob'][2] ?>" size="4">
                                                
                            </td>
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
