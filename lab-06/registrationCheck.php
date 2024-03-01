<?php
<<<<<<< Updated upstream
    $name = $email = $username = $password = $confirmPassword = $gender = $dob_dd = $dob_mm = $dob_yyyy = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm-password"];
        $gender = isset($_POST["male"]) ? "male" : isset($_POST["female"]) ? "female" : "other";
        $dob_dd = $_POST["day"];
        $dob_mm = $_POST["month"];
        $dob_yyyy = $_POST["year"];
        echo $name;
        echo $username;
    }
=======
    session_start();

    $name = $email = $username = $password = $confirmPassword = $gender = $dob_day = $dob_month = $dob_year = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm-password"];
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $dob_day = $_POST["day"];
        $dob_month = $_POST["month"];
        $dob_year = $_POST["year"];

        if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirmPassword) || empty($gender) || empty($dob_day) || empty($dob_month) || empty($dob_year)) {
            $_SESSION["registration"]["last_error"] = "All fields must be filled out";
            $_SESSION["registration"]["status"] = "unsuccessful";
        } elseif ($password !== $confirmPassword) {
            $_SESSION["registration"]["last_error"] = "Passwords do not match";
            $_SESSION["registration"]["status"] = "unsuccessful";
        } else {
            $_SESSION["registration"]["last_error"] = null;
            $_SESSION["users"][$username] = array(
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "gender" => $gender,
                "dob_day" => $dob_day,
                "dob_month" => $dob_month,
                "dob_year" => $dob_year
            );
            $_SESSION["registration"]["status"] = "successful";
            
            header("location: login.php");
            exit();
        }
    }

    header("location: register.php");
    exit();
>>>>>>> Stashed changes
?>