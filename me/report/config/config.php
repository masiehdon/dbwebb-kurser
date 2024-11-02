<?php
if ($_SERVER["HTTP_HOST"] == "localhost") {
    $baseUrl = 'http://localhost/dbwebb-kurser/me/report/public/';
    $assetsUrl = 'http://localhost/dbwebb-kurser/me/report/public/';
} else {
    $baseUrl = 'https://www.student.bth.se/~mado22/dbwebb-kurser/me/report/public/';
    $assetsUrl = 'https://www.student.bth.se/~mado22/dbwebb-kurser/me/report/public/';
}

// The base directory for the project, useful for including files or resources
$rootDir = __DIR__ . '/../';

// Define the database path relative to the root directory
if (!defined('DB_PATH')) {
    define('DB_PATH', $rootDir . 'db/db.sqlite'); // Ensure this path is correct
}
