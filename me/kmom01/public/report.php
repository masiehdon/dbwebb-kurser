<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../../config/config.php" ?>

<link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
<link rel="stylesheet" href="<?= $baseUrl ?>css/report.css">

  
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav>

            <div class="navbar">
            <?php include("../view/header.php"); ?>

            </div>

        </nav>

        <main class="main">
            <div class="header-report">
                <h1>Rapport</h1>
            </div>
            <div class="main-content-report">

                <aside class="aside">
                    <ul>
                        <li><a href="./kursmoment/kmom1.php">Kursmoment 1</a></li>
                        <li><a href="./kursmoment/kmom2.php">Kursmoment 2</a></li>
                        <li><a href="./kursmoment/kmom3.php">Kursmoment 3</a></li>
                        <li><a href="./kursmoment/kmom4.php">Kursmoment 4</a></li>

                    </ul>
                </aside>
                <article class="article">
                    <p>
                        På denn asida kan du navigera mellan rapporter till de olika obligatoriska kursmomenter.<br>
                        Länken till respektive rapport finns i rutan till vänster.
                    </p>
                </article>

            </div>
        </main>



        <footer>

            <div class="footer">
                <?php
                include("../view/footer.php");
                ?>
            </div>
        </footer>
    </div>
</body>

</html>