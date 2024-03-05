<?php

function parseConfig($filePath) {
    $configContents = file_get_contents($filePath);

    if ($configContents === false) {
        die("Error: Unable to read the configuration file.");
    }

    $config = json_decode($configContents, true);

    if ($config === null) {
        die("Error: Unable to parse JSON in the configuration file.");
    }

    return $config;
}
