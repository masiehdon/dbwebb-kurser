<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../../config/config.php" ?>

    <link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/footer.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/friday.css">
    <title>Document</title>
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

        <div class="output">

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {

                $selectedDate = $_POST['date'];
                $targetDay = 'Friday';
                $date = new DateTime($selectedDate);
                $dayOfWeek = date('l', strtotime($selectedDate));
                $daysUntilTarget = (7 - $date->format('w') + date('w', strtotime($targetDay))) % 7;
                $divClass = "default";

                if (empty($selectedDate)) {
                    $divClass = "default";
                    echo "Please select a date!";
                } else {

                    if ($dayOfWeek == "Friday") {
                        $divClass = "friday";
                        echo "YEEEEHHHHHHHHH " . $selectedDate . " is a Friday!";
                    } elseif ($dayOfWeek !== "Friday") {
                        $divClass = "default";
                        echo $daysUntilTarget > 1 ? $selectedDate . " is NOT a Friday! But Only " . $daysUntilTarget . " days until next Friday!" : "Only " . $daysUntilTarget . " day until next Friday!";

                    }
                }
            }

            ?>
        </div>
        <div class=<?= $divClass ?> default>
            <div class="which-day">
                <h1>Which day?</h1>
            </div>
            <br><br>
            <form action="friday.php" method="post">
                <label for="date">Select a date:</label>
                <input type="date" id="date" name="date">
                <input type="submit" value="Submit" class="button">
            </form>

        </div>



    </div>
    <footer>
            <div class="footer">
                <?php
                include("../view/footer.php");
                ?>
            </div>
        </footer>
</body>

</html>