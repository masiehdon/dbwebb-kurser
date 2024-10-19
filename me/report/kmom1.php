<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../../config/config.php" ?>

<link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
<link rel="stylesheet" href="<?= $baseUrl ?>css/header.css">
<link rel="stylesheet" href="<?= $baseUrl ?>css/footer.css">


    <title>Document</title>
</head>
<body>
    <div class="container">
    <nav>
    <div class="navbar">
    <?php
               $title = "header";
               include"../view/header.php";
               ?>

           </div>
       </nav>

       <main class="main">
       <div class="main-content-report-kmom">
           
       <?php
                $jsonData = file_get_contents('./reports/kmom1.json');
                
                $report = json_decode($jsonData, true);

                echo "<h1>" . $report['title'] . "</h1>";
                echo "<p>" . $report['report'] . "</p>";
                ?>
       </div>
     </div>
 
       <footer>

            <div class="footer">
            <?php
                include"../../view/footer.php";
                ?>
            </div>
        </footer>
    </div>
</body>
</html>