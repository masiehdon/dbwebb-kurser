
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../../config/config.php" ?>

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
     <!-- Formulär för användarnamn -->
            <form action="$_SERVER['PHP_SELF']" method="post" class="name-form">
               
                <input type="text" id="player_name" name="player_name" placeholder="Enter your name" required>
                <input type="submit" name="submit_name" value="Submit Name">

            </form>

            <form action="" method="post" class="reset-form">

                <input type="submit" name="reset_name" value="Reset Game">
            </form>
            
            </div>

           <div class="game-area">


               
                <div class="display-username">
                    <h3 class="current-user"><?php echo $_SESSION["player_name"] ? $_SESSION["player_name"] : "Guest"; ?></h3>
                </div>
                <!-- Formulär för att starta spelet -->
                <div class="game-start">
                    <form action="" method="post">
                        <input type="submit" name="start_game" value="Start the game">
                    </form>
                </div>

                <!-- Visa spelet endast om "Start the game"-knappen har klickats -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["start_game"])) {
                   

                 

                    // Visa spelet efter att användaren klickat på "Start the game"
                    echo "<div class='meaning'>";
                    echo "<h3>Meaning: $meaning</h3>";
                    echo "</div>";
                    ?>

                    <!-- Formulär för att gissa namnet -->
                    <div class="name">
                        <form action="" method="post">

                            <input type="text" id="guess" name="guess" placeholder="Guess the name" required>
                            <input type="submit" name="submit_guess" value="Check your guess">
                        </form>
                    </div>

                    <?php
                }
                ?>

                <!-- Hantera gissningar -->

                <div class="output">
                    <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_guess"])) {
                    $user_guess = $_POST["guess"];

                    // Hämta slumpat index från sessionen
                    $random_index = $_SESSION['random_index'];

                    // Kontrollera om gissningen är korrekt
                    if (strtolower($user_guess) == strtolower($names[$random_index])) {
                        echo "<p>Correct guess! The name is: " . $names[$random_index] . "</p>";
                    } else {
                        echo "<p>Wrong guess! Try again</p>";
                    }
                }
                ?>
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