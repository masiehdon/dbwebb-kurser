<?php
session_start(); // Start the session at the beginning

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection and data-fetching functions
include_once __DIR__ . '/../src/functions.php';

// Handle username submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_name']) && !empty($_POST['username'])) {
        // Set the username in the session
        $username = $_POST['username'];
        setUsername($username);
    }

    if (isset($_POST['reset_game'])) {
        // Reset the username in the session
        session_unset(); // Clear all session data
    }
}



// Get the current username from the session
$currentUser = getUsername();


// retrieving the variables
$displayedMeaning = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["start_game"])) {
    // Call startGame() and capture its returned data
    $data = startGame();

    if ($data) {
        $id = $data['id'];
        $name = $data['name'];
        $meaning = $data['meaning'];
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['meaning'] = $meaning;
    } else {
        $error_message = "No data found or query failed.";
    }


    $displayedMeaning = $meaning;
    $displayedName = $name;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_guess"])) {
    $guess = $_POST["guess"];
    $name = $_SESSION['name'] ?? '';
    $isCorrect = $guess && submit_guess($guess, $name);
}

// Search the name in the db depending on displayed meaning
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["searchName"])) {
    $searchResult = $_SESSION['name'];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= $assetsUrl ?>css/style.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/footer.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/month.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/guess-game.css">
    <title>Guess the name</title>
</head>

<body>

    <div class="container">
        <nav>
            <div class="navbar">
                <?php
                $title = "Index";
                include("../view/header.php");
                ?>
            </div>
        </nav>

        <div class="guess-game">
            <div class="form-area">
                <!-- Username form -->
                <form action="" method="post" class="name-form">
                    <input type="text" id="username" name="username" placeholder="Enter your name" required>
                    <input type="submit" name="submit_name" value="Submit Name">
                </form>

                <form action="" method="post" class="reset-form">
                    <input type="submit" name="reset_game" value="Reset Game">
                </form>
            </div>

            <div class="game-area">
                <div class="display-username">
                    <h3 class="current-user">Now playing: <?= htmlspecialchars($currentUser) ?></h3>
                </div>

                <!-- Game Start Form -->
                <div class="game-start">
                    <form action="" method="post">
                        <input type="submit" name="start_game" value="Start the game">
                    </form>
                </div>

                <div class="name">
                    <form action="" method="post">
                        <input type="text" id="guess" name="guess" placeholder="Guess the name" required>
                        <input type="submit" name="submit_guess" value="Check your guess">
                    </form>
                </div>

                <div class="output">
                    <h3>The name can be descibed as: <?php echo $displayedMeaning ?></h3>
                </div>
                <div class="guess-result">
                    <h2>
                        <?php
                        if (isset($isCorrect)) {
                            echo $isCorrect ? "<p>Correct guess! The correct name is: " . $_SESSION["name"] . "</p>"
                                : "<p>Wrong guess! Try again</p>";
                        }
                        ?>
                    </h2>
                </div>
                <div class="search">
                    <form action="" method="post">

                        <input type="submit" name="searchName" value="Search for correct name">
                        <?php if (isset($searchResult)): ?>
                            <h4 class="search-result">
                                <?php echo $_SESSION['meaning'] . " stand for: " . $searchResult; ?>
                            </h4>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer">
                <?php include("../view/footer.php"); ?>
            </div>
        </footer>
    </div>

</body>

</html>