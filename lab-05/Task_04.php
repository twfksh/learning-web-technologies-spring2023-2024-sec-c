<?php
    $name = $email = $usrname = $passwd = $confirmPasswd = $gender = $dob_day = $dob_month = $dob_year = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = custom_trim($_POST["name"]);
        $email = custom_trim($_POST["email"]);
        $usrname = custom_trim($_POST["username"]);
        $passwd = custom_trim($_POST["password"]);
        $confirmPasswd = $_POST["confirm-passwd"];
        $gender = $_POST["gender"];
        $dob_day = $_POST["day"];
        $dob_month = $_POST["month"];
        $dob_year = $_POST["year"];

        if (validateUsername($usrname) && validatePassword($passwd)) {
            echo "Registration successful.<br>";
        } else {
            echo "Registration unsuccessful.<br>";
        }
    }

    function validateUsername($usrname) {
        $isValid = true;
        // $usrname = custom_trim($usrname);
        $len = custom_strlen($usrname);
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
        // $passwd = custom_trim($passwd);
        $len = custom_strlen($passwd);
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

    function custom_strlen($str) {
        $len = 0;
        while (isset($str[$len++]));
        return $len;
    }

    function custom_substr($str, $start, $length = null) {
        $result = '';

        $strLen = custom_strlen($str);

        if ($start < 0) $start = max(0, $strLen + $start);

        if ($length !== null && $length < 0) $length = max(0, $strLen + $length - $start);

        for ($i = $start; $i < $strLen && ($length === null || $i < $start + $length); $i++) $result .= $str[$i];

        return $result;
    }

    function custom_trim($str) {
        $len = custom_strlen($str);
        if ($len == 0) return $str;

        $begin = 0;
        $end = $len - 1;

        while ($begin < $len && $str[$begin] === ' ') $begin++;
        while ($end >= 0 && $str[$end] === ' ') $end--;

        if ($begin <= $end) return custom_substr($str, $begin, $end - $begin + 1);
        else return "";
    }
?>