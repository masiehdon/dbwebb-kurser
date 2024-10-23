<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../config/config.php'; ?>

    <link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/header.css">

    <title>Navbar</title>
</head>

<body>
    <?php
    $title = "Navbar";
    ?>
    <header>
        <div class="bg-image">

        </div>
        <nav class="navbar">
            <ul>
                <li><a href="<?= $baseUrl ?>me.php">Home</a></li>
                <li><a href="<?= $baseUrl ?>about.php">About</a></li>
                <li><a href="<?= $baseUrl ?>report.php">Reports</a></li>
                <li><a href="<?= $baseUrl ?>friday.php">Friday</a></li>
                <li><a href="<?= $baseUrl ?>calendar.php">Month</a></li>
                <li><a href="<?= $baseUrl ?>month.php">Calendar</a></li>
                <li><a href="<?= $baseUrl ?>guessname.php">Guess the Name</a></li>


            </ul>
        </nav>
       
    </header>

</body>

</html>