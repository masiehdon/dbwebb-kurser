<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Configuration for localhost
    $baseUrl = 'http://localhost/dbwebb-kurser/me/report/public/';
    $assetsUrl = 'http://localhost/dbwebb-kurser/me/report/public/';
} else {
    // Configuration for live server
    $baseUrl = 'https://www.student.bth.se/~mado22/dbwebb-kurser/me/public/';
    $assetsUrl = 'https://www.student.bth.se/~mado22/dbwebb-kurser/me/';
}

// The base directory for the project, useful for including files or resources
$rootDir = __DIR__ . '/../'; 
?>
