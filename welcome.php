<?php
    session_start();

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe store</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <?php
        require "nav.php";

    ?>
    <div class="container">
        <div class="left">
            <div class="content-left">
                <h1 class="text">Welcome   
                <?php 
                    if(isset($_SESSION['loggedin'])){
                        echo $_SESSION["username"];
                    }
                ?>
                </h1>
                <p class="para">Get started with the Brand new shoes Boost your speed with our products</p>
                <p class="para"><a href="products.php" class="shop-now">Shop now</a></p>
            </div>
        </div>
        <div class="right">
            <img src="image/img2.png" height="600px">
        </div>
    </div>
</body>
</html>