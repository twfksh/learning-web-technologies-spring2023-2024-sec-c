<?php

    $curPasswd = $newPasswd = $reNewPasswd = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curPasswd = $_POST["cur-passwd"];
        $newPasswd = $_POST["new-passwd"];
        $reNewPasswd = $_POST["re-new-passwd"];

        if (validatePassword($curPasswd) && validatePassword($newPasswd) && validatePassword($reNewPasswd)) {
            if ($curPasswd == $newPasswd) {
                echo "New password matches the current password, enter a new password!";
            } elseif ($newPasswd !== $reNewPasswd) {
                echo "Retype new password correctly!";
            } else {
                echo "Password change successfull!";
            }
        } else {
            echo "Invalid password, enter correct password! <br>";
        }
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