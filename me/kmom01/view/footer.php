<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../config/config.php'; ?>

<link rel="stylesheet" href="<?= $baseUrl ?>css/style.css">
<link rel="stylesheet" href="<?= $baseUrl ?>css/footer.css">


    <title>Document</title>
</head>

<body>
    <?php
    $title = "Footer";
    ?>
    <footer>
   <div class="footer-wrapper" >

        <div class="col1 col">
            <p>Online Resources</p>
            <ul>
                <li><a href="https://developer.mozilla.org/en-US/" target="_blank" title">
                        </title>MDN</a></li>
                <li><a href="https://www.w3schools.com/" target="_blank">W3Schools</a></li>
            </ul>
            </div>

            <div class="col2 col">
                <p>Test your website</p>
                <ul>
                    <li><a href="https://gtmetrix.com/" target="_blank">GTmetrix</a></li>
                </ul>
            </div>

            <div class="col3 col">
                <p>Fun facts</p>
            </div>

            <div class="copyright col">
                Copyright &copy 2024
            </div>
            </div>
            </footer>

        
</body>

</html>