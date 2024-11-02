<?php
    date_default_timezone_set('CET');
    $month = date("m");
    $year = date("Y");
    $month_name = date('F', mktime(0, 0, 0, $month, 1));
    $day = date("d");
$currentTime = date("h:i:sa");

    if (isset($_GET['month']) && isset($_GET['year'])) {
      $month = $_GET['month'];
      $year = $_GET['year'];

    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../../config/config.php" ?>

    <link rel="stylesheet" href="<?= $assetsUrl ?>css/style.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/today.css">

    <title>Today</title>
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


<div class="date-time">
    <h1>Today is the <?= $day . " " . $month_name ?> <?= $year ?></h1>
  
    <p><?= $currentTime ?></p>
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