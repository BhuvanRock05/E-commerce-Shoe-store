<?php
    require "_dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <title>Document</title>
</head>
<body>
    <?php
        require "nav.php";
    ?>

    <?php
        $sql = "select * from products";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num >0){
            echo " <div class='container-products'>
                <div class='outer'>";
            while($row = mysqli_fetch_assoc($result)){
               /* echo $row['imag'];
                echo "<img src='image/product/".$row['imag']."'>";
                echo $row['pno'];
                echo $row['pname'];
                echo $row['price'];
                echo "<br>";*/
                    $pid=$row['pno'];
                    echo "<div class='single-product'>
                    <img src='image/product/".$row['imag']."'>
                    <h1>".$row['pname']."</h1>
                    <p>Price $".$row['price']."</p>
                    <button class='btn'><a href='addcart.php?addid=".$pid."'>add cart</a></button>
                    </div>";
                
            }
            echo "</div>
                </div>";
        }
    ?>
    
</body>
</html>