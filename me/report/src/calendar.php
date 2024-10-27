<?php
// Define the path to the SQLite database file
$dbPath = __DIR__ . '/path/to/db.sqlite';

try {
    // Create a new PDO instance and connect to the SQLite database
    $pdo = new PDO("sqlite:" . $dbPath);

    // Set error mode to exceptions for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set the default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Connected to the SQLite database successfully!";
} catch (PDOException $e) {
    // Handle any errors during connection
    echo "Connection failed: " . $e->getMessage();
}
