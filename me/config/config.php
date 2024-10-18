<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Configuration for localhost
    $baseUrl = 'http://localhost/dbwebb-kurser/me/public/';
} else {
    // Configuration for live server
    $baseUrl = 'https://www.student.bth.se/~mado22/dbwebb-kurser/me/kmom01/public/';

    $rootDir = __DIR__ . '/../';

   
}
