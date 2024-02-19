<?php
$usrname = $passwd = "";
$remember = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usrname = $_POST["username"];
    $passwd = $_POST["password"];
    $remember = ($_POST["remember"] === null) ? $_POST["remember"] : "";

    if (validateUsername($usrname) && validatePassword($passwd)) {
        echo "Login successful, $usrname <br>";
    } else {
        echo "Invalid username or password!<br>";
    }
}

function validateUsername($usrname) {
    $isValid = true;
    $usrname = trim($usrname);
    $len = strlen($usrname);
    if ($len < 2) {
        $isValid = false;
    } else {
        for ($i = 0; $i < $len; $i++) {
            $ch = $usrname[$i];
            if (!(($ch >= 'A' && $ch <= 'Z') ||
                ($ch >= 'a' && $ch <= 'z') ||
                ($ch >= '0' && $ch <= '9') ||
                ($usrname[$i] == '.') || ($usrname[$i] == '-') || ($usrname[$i] == '_'))) {
                $isValid = false;
                break;
            }
        }
    }
    return $isValid;
}

function validatePassword($passwd) {
    $isValid = true;
    $passwd = trim($passwd);
    $len = strlen($passwd);
    if ($len < 8) {
        $isValid = false;
    } else {
        $containsSpecialChar = false;
        for ($i = 0; $i < $len; $i++) {
            if ($passwd[$i] == '@' || $passwd[$i] == '#' || $passwd[$i] == '$' || $passwd[$i] == '%') {
                $containsSpecialChar = true;
                break;
            }
        }
        if (!$containsSpecialChar) $isValid = false;
    }
    return $isValid;
}
?>
