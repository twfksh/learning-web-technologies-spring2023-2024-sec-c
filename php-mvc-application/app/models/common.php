<?php

function parseConfig($filePath) {
    return json_decode(file_get_contents($filePath), true);
}