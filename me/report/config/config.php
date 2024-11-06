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
if (!defined('NAME_DB_PATH')) {
    define('NAME_DB_PATH', $rootDir . 'db/name.db'); // Ensure this path is correct
}

if (!defined('USERS_DB_PATH')) {
    define('USERS_DB_PATH', $rootDir . 'db/users.db'); // Path to the users database
}

// Function to connect to the name database
function getMainDbConnection() {
    try {
        $nameDb = new PDO('sqlite:' . NAME_DB_PATH);
        $nameDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $nameDb;
    } catch (PDOException $e) {
        echo "Name Database Connection Error: " . $e->getMessage();
        return null;
    }
}

// Function to connect to the users database
function getUsersDbConnection() {
    try {
        $usersDb = new PDO('sqlite:' . USERS_DB_PATH);
        $usersDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $usersDb;
    } catch (PDOException $e) {
        echo "Users Database Connection Error: " . $e->getMessage();
        return null;
    }
}
