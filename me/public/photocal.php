<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../../config/config.php" ?>

    <link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/footer.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>css/photocal.css">
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
        
        // Step 1: Initialize displayed month and year for first-time load
        if (!isset($_GET['month']) && !isset($_POST['action'])) {
            // First time page load - use current month and year
            $displayed_month = date('m');
            $displayed_year = date('Y');
        } else {
            // Not the first time load - use GET parameters or POST data to determine displayed month/year
            $displayed_month = isset($_GET['month']) ? (int)$_GET['month'] : (int)$_POST['displayed_month'];
            $displayed_year = isset($_GET['year']) ? (int)$_GET['year'] : (int)$_POST['displayed_year'];
        }

        // Step 2: Handle form submissions for navigation (Previous/Next)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['action'])) {
                if ($_POST['action'] == 'previous') {
                    if ($displayed_month == 1) {
                        $displayed_month = 12;
                        $displayed_year -= 1; // Move to December of the previous year
                    } else {
                        $displayed_month -= 1;
                    }
                } elseif ($_POST['action'] == 'next') {
                    if ($displayed_month == 12) {
                        $displayed_month = 1;
                        $displayed_year += 1; // Move to January of the next year
                    } else {
                        $displayed_month += 1;
                    }
                }
            }
        }

        // Step 3: Update the displayed month name after determining the current month/year
        $month_name = date('F', mktime(0, 0, 0, $displayed_month, 1, $displayed_year));
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $displayed_month, $displayed_year);
        $firstDay = date('N', strtotime("$displayed_year-$displayed_month-01")); 
        ?>

        <div class="month">
            <form method="POST" class="calendar-navigation">
                <input type="hidden" name="displayed_month" value="<?php echo $displayed_month; ?>">
                <input type="hidden" name="displayed_year" value="<?php echo $displayed_year; ?>">
                <button type="submit" name="action" value="previous" class="arrow-left">&larr; Previous</button>
                <button type="submit" name="action" value="next" class="arrow-right">Next &rarr;</button>
            </form>

            <ul>
                <li class="year"><?php echo $displayed_year; ?></li>
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
            $sunday = "sunday";
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
                    $dayOfWeek = date('N', strtotime("$displayed_year-$displayed_month-$dayNum"));
                    $dayOfYear = date('z', strtotime("$displayed_year-$displayed_month-$dayNum")) + 1;

                    // Check if it's Sunday
                    if ($dayOfWeek == "7") {
                        echo "<li class=\"$sunday\">$dayNum <span class=\"day-of-year\">$dayOfYear</span></li>";
                    }
                    // Otherwise, render the day normally
                    else {
                        $isToday = ($dayNum == $today && $displayed_month == date('m') && $displayed_year == date('Y'));
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
