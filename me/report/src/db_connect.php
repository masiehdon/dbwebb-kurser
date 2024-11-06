<?php
include_once __DIR__ . '../config/config.php';


// Function to establish a database connection
function connectToNameDatabase() {
    try {
        $pdo = new PDO("sqlite:" . NAME_DB_PATH);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Name-Database connection failed: " . $e->getMessage();
        return null;
    }
};



function connectToUserDatabase() {
    try {
        $pdo = new PDO("sqlite:" . USERS_DB_PATH);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Name-Database connection failed: " . $e->getMessage();
        return null;
    }
};
