<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../config/config.php'; ?>

<link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">

<title>Navbar</title>
</head>

<body>
    <?php
    $title = "Navbar";
    ?>
    <header>
        <nav class="navbar">
        <ul>
                <li><a href="<?= $baseUrl ?>/index.php">Home</a></li>
                <li><a href="<?= $baseUrl ?>/about.php">About</a></li>
                <li><a href="<?= $baseUrl ?>/report.php">Reports</a></li>
            </ul>
        </nav>
    </header>

</body>

</html>