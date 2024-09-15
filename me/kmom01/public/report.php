<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
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

        <main class="main">
            <div class="me">
                <h1>Reports</h1>
            </div>
            <div class="main-content">
                <ul>
                    <li><a href="./kursmoment/kmom1.php">Kursmoment 1</a></li>

                </ul>

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