<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include "../../config/config.php" ?>

  <link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>css/footer.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>css/month.css">
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
    <?php
    date_default_timezone_set('CET');
    $month = date("m");
    $year = date("Y");
    $month_name = date('F', mktime(0, 0, 0, $month, 1));
    $day = date("d");


    if (isset($_GET['month']) && isset($_GET['year'])) {
      $month = $_GET['month'];
      $year = $_GET['year'];

    }



    ?>

    <div class="month">
      <ul>
        <li class="year"><?php echo $year; ?></li>
        <li class="prev">&#10094;</li>
        <li class="next">&#10095;</li>
        <li class="current-month">
          <?php echo $month_name; ?>
        </li>

      </ul>
    </div>


    <ul class="weekdays">
      <?php
      $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
      foreach ($daysOfWeek as $day)
        echo "<li>$day</li>"
          ?>

      </ul>

      <ul class="days">
        <?php
      $year = date("Y");
      $sunday = "sunday";
      $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
      $firstDay = date('N', strtotime("$year-$month-01"));  // 1 for Monday, 7 for Sunday
      $today = date('j');
      $totalSlots = $firstDay - 1 + $daysInMonth;


      for ($i = 1; $i <= $totalSlots; $i++) {
        $dayNum = $i - $firstDay + 1;  // Calculate the day number
      

        if ($i < $firstDay) {
          echo "<li></li>";
        }
        // Check if the number is valid before proceeding
        elseif ($dayNum > 0 && $dayNum <= $daysInMonth) {
          // Get the day name for the current day number
          $dayOfWeek = date('N', strtotime("$year-$month-$dayNum"));
          $dayOfYear = date('z', strtotime("$year-$month-$dayNum")) + 1;


          // Check if it's Sunday
          if ($dayOfWeek == "7") {
            echo "<li class=\"$sunday\">$dayNum <span class=\"day-of-year\">$dayOfYear</span></li>";

          }
          // Otherwise, render the day normally
          else {
            $isToday = ($dayNum == $today && $month == date('m') && $year == date('Y'));
            $class = $isToday ? "current-day days" : "days";
            echo "<li class=\"$class\">$dayNum<span class=\"day-of-year\">$dayOfYear</span></li>";
          }
        }
      }
      ?>

    </ul>


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