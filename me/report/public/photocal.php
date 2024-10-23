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

            $displayed_month = isset($_GET['month']) ? (int) $_GET['month'] : (int) $_POST['displayed_month'];
            $displayed_year = isset($_GET['year']) ? (int) $_GET['year'] : (int) $_POST['displayed_year'];
        }

        // Handle form submissions for navigation (Previous/Next)
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

        // Update the displayed month name 
        $month_name = date('F', mktime(0, 0, 0, $displayed_month, 1, $displayed_year));
        $month_number = (int) date('n', strtotime($month_name));
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $displayed_month, $displayed_year);
        $firstDay = date('N', strtotime("$displayed_year-$displayed_month-01"));


        // Import images and store in array
        $bg_images = [
            $baseUrl . "img/photocal/01.webp",
            $baseUrl . "img/photocal/02.webp",
            $baseUrl . "img/photocal/03.webp",
            $baseUrl . "img/photocal/04.webp",
            $baseUrl . "img/photocal/05.webp",
            $baseUrl . "img/photocal/06.webp",
            $baseUrl . "img/photocal/07.webp",
            $baseUrl . "img/photocal/08.webp",
            $baseUrl . "img/photocal/09.webp",
            $baseUrl . "img/photocal/10.webp",
            $baseUrl . "img/photocal/11.webp",
            $baseUrl . "img/photocal/12.webp",
        ]
            ?>

        <div class="month"
            style="background-image: url('<?php echo $bg_images[$month_number - 1]; ?>'); background-size: cover; background-position: center; height: 70vh;">


            <!-- Display navigation buttons -->
            <form method="POST" class="calendar-navigation">
                <input type="hidden" name="displayed_month" value="<?php echo $displayed_month; ?>">
                <input type="hidden" name="displayed_year" value="<?php echo $displayed_year; ?>">
                <button type="submit" name="action" value="previous" class="arrow-left">Previous month</button>
                <button type="submit" name="action" value="next" class="arrow-right">Next month</button>
            </form>
            <di class="date-display">
                <ul>
                    <li class="year">
                        <h2><?php echo $displayed_year; ?></h2>
                    </li>
                    <li class="current-month">
                        <h2><?php echo $month_name; ?></h2>
                    </li>
                </ul>
            </di>

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