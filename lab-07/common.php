<?php

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
