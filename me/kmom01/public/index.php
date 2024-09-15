<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Index</title>
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
            <h1>My PHP journey</h1>
        </div>
        <div class="main-content">
            <img src="img/hacker.webp" alt="me">
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