<?php
include_once __DIR__ . '../src/db_connect.php';

// Function to set the username in the session
function setUsername($username) {
    if (!session_id()) {
        session_start(); // Start the session if it hasn’t been started yet
    }
    $_SESSION['username'] = htmlspecialchars($username); // Store the sanitized username in the session
}

// Function to retrieve the username from the session
function getUsername() {
    if (!session_id()) {
        session_start();
    }
    return $_SESSION['username'] ?? 'Guest'; 
}

// Starting the game
function startGame() {
    $pdo = getMainDbConnection(); // Get a new database connection
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM names ORDER BY RANDOM() LIMIT 1");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $_SESSION["name"] = $result['name']; // Store the fetched name in session
                return $result;
            } else {
                return null; // Return null if no data
            }
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return null;
        }
    } else {
        echo "No database connection.";
        return null;
    }
}

// Function for user registration
function saveUserToDatabase($username, $email, $password) {
    try {
        // Connect to the users database
        $db = getUsersDbConnection();
        if (!$db) {
            echo "Unable to connect to users database.";
            return;
        }

        // Hash the password before saving
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to insert a new user
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        // Execute the statement
        $stmt->execute();

        echo "User registered successfully!";
    } catch (PDOException $e) {
        // Handle errors (e.g., if the username or email is already taken)
        if ($e->getCode() === '23000') {
            echo "Username or email already exists.";
        } else {
            echo "Database Error: " . $e->getMessage();
        }
    }
}

// Function to submit a guess
function submit_guess($guess, $name) {
    return strtolower($guess) == strtolower($name);
}

// Function to search for the name of a displayed meaning
function searchForName($searchResult) {
    echo htmlspecialchars($searchResult);
}
