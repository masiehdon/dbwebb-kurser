<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <nav>
           
           <div class="navbar">
               <?php
               $title = "header";
               include("../../view/header.php");
               ?>
           </div>

       </nav>

       <main class="main">
       <div class="main-content-report">
           
       <?php
                // Load the JSON file
                $jsonData = file_get_contents('./reports/kmom1.json');
                
                // Decode the JSON file into a PHP associative array
                $report = json_decode($jsonData, true);

                // Display the title and report content
                echo "<h1>" . $report['title'] . "</h1>";
                echo "<p>" . $report['report'] . "</p>";
                ?>
       </div>
     </div>
       <footer>

            <div class="footer">
                <?php
                include("../../view/footer.php");
                ?>
            </div>
        </footer>
    </div>
</body>
</html>