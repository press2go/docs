<?php

$static_file = __DIR__ . "/public{$_SERVER["REQUEST_URI"]}";

error_log("REQUEST_URI: {$_SERVER["REQUEST_URI"]} ($static_file)");

// serve the requested resource as-is.
if (file_exists($static_file) && is_file($static_file)) {

    switch (substr($static_file, strrpos($static_file, '.'))) {
    case '.js':
        $mime = 'application/javascript';
        break;
    case '.css':
        $mime = 'text/css';
        break;
    default:
        $mime = mime_content_type($static_file);
    }

    header("Content-type: $mime");
    readfile($static_file);
    return;
}

$_SERVER['APPLICATION_ENV'] = 'development';
$_SERVER['SCRIPT_NAME'] = '/front.php';

require_once __DIR__ . '/front.php';
