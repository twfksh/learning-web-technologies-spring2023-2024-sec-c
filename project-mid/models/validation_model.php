<?php

function validateUsername($usrname) {
    $isValid = true;
    $usrname = custom_trim($usrname);
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
    $passwd = custom_trim($passwd);
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

function validateImage($image) {
    if ($image && $image["error"] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxFileSize = 2 * 1024 * 1024; 

        $fileType = $image["type"];
        $fileSize = $image["size"];

        if (!inArray($fileType, $allowedTypes)) {
            echo "Invalid file type, Allowed JPEG, PNG only";
            header('location: ../views/error.php?err=Error(image upload): Invalid file type, Allowed JPEG, PNG only');
            return false;
        } elseif ($fileSize > $maxFileSize) {
            header('location: ../views/error.php?err=Error(image upload): Invalid file size');
            return false;
        } else {
            $uploadDirectory = 'uploads/images/';
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $targetFileName = $uploadDirectory . $_SESSION['user']['username'] . '.' . (($fileType == 'image/jpeg') ? 'jpg' : 'png');

            if (move_uploaded_file($image["tmp_name"], $targetFileName)) {
                return true;
            } else {
                return false;
            }
        }
    } else {
        header('location: ../views/error.php?err=Error(image upload): An unknowd error occured');
        return false;
    }
}

function custom_strlen($str) {
    $len = 0;
    while (isset($str[$len])) $len++;
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

function inArray($needle, $haystack) {
    foreach ($haystack as $item) {
        if ($item === $needle) {
            return true;
        }
    }
    return false;
}

?>