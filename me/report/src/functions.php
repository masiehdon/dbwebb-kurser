<?php


include_once __DIR__ . '/db_connect.php';



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
    
    $pdo = connectToDatabase(); // Get a new database connection
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


function submit_guess($guess, $name) {
   
    if(strtolower($guess) == strtolower($name)){
       return true;
    } else {
       return false;
    }
}

// Search for the name of displayed meaning

function searchForName($searchResult) {
    echo $searchResult;
}
