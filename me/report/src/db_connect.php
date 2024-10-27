<?php
require_once __DIR__ . '/../config/config.php';

// Function to establish a database connection
function connectToDatabase() {
    try {
        $pdo = new PDO("sqlite:" . DB_PATH);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
        return null;
    }
}

