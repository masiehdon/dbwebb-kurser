<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../../config/config.php" ?>

<link rel="stylesheet" href="<?= $assetsUrl ?>css/style.css">
<link rel="stylesheet" href="<?= $assetsUrl ?>css/footer.css">

  

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
            <div class="p">
            <p>PHP is my favorite language. I love it! <br>
        Jag erkänner att jag inte har börjat älska PHP än men det är aldrig för sent. Jag vill lära mig PHP och databaser vilket kommer ge mig möjlighten till att dyka djupare i programmerings-världen!</p>    
            </div>
            
        </div>
        <div class="main-content bg">
            
        </div>
        </main>

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