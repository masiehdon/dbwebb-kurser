<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Configuration for localhost
    $baseUrl = 'http://localhost/dbwebb-kurser/me/kmom01/public/';
} else {
    // Configuration for live server
    $baseUrl = 'https://www.student.bth.se/~mado22/dbwebb-kurser/me/kmom01/';

    $rootDir = __DIR__ . '/../';

   
}
