<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../../config/config.php" ?>

    <link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/footer.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/month.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/guess-game.css">
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


            <form action="process.php" method="post">
                <label for="username">Användarnamn:</label>
                <input type="text" id="player_name" name="player_name" required>
                <input type="submit" value="Submit">
            </form>


            <div class="game-area">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $player_name = $_POST["player_name"];
                    // storing player name in session
                    $_SESSION["player_name"] = $_POST["player_name"];
                }


                ?>

                <?php
                // Arrays med namn och betydelser
                $names = [
                    "Alice",
                    "Bob",
                    "Charlie",
                    "Diana",
                    "Edward",
                    "Fiona",
                    "George",
                    "Hannah",
                    "Isaac",
                    "Julia"
                ];
                $meanings = [
                    "Noble",
                    "Bright Fame",
                    "Free Man",
                    "Divine",
                    "Wealthy Guardian",
                    "Fair",
                    "Farmer",
                    "Grace",
                    "Laughter",
                    "Youthful"
                ];
                ?>

                <div class="game-start">
                                <!-- starting the game -->

                    <form action="process.php" method="post">

                        <input type="submit" name="start_game" value="Start the game">
                    </form>
                </div>

                <div class="meaning">

                    <?php
                    if ($_SERVER("REQUEST_METHOD") == "POST" && isset($_POST["start_game"])) {
                        $random = rand(0, count($names) - 1);
                        $meaning = $meanings[$random];

                        // storing random index in session
                        $_SESSION['random_index'] = $random;
                        // Display random meaning
                        echo "<h3>$meaning</h3>";
                    }

                    ?>

                </div>

                <div class="name">

                    <form action="process.php" method="post">
                        <label for="guess">Guess the name: </label>
                        <input type="text" id="guess" name="guess" required>
                        <input type="submit" value="Guess">
                    </form>

                    <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guess"])) {
                $user_guess = $_POST["guess"];

                // retrieve random index
                $random_index = $_SESSION['random_index'];

                // check if guess is correct
                if (strtolower($user_guess) == strtolower($names[$random_index])) {
                    echo "<p>Correct guess! The name is: " . $names[$random_index] . "</p>";
                } else {
                    echo "<p>Wrong guess! Try agin</p>";
                }
            }
            ?>

                </div>

            </div>






        </div>


        <footer>
            <div class="footer">
                <?php
                include("../view/footer.php");
                ?>
            </div>
        </footer>
    </div>

</body>

</html>