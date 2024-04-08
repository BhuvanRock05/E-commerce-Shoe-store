<?php
    require "_dbconnect.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Document</title>
</head>
<body>
    <?php
        require "nav.php";
        echo "<h1>My Orders</h1>";
        // $sql = "select * from cart";
        // $result = mysqli_query($conn,$sql);
        if(isset($_SESSION['loggedin'])){
            // echo $_SESSION["username"];
        
            $name = $_SESSION['username'];
            $sql1 = "select * from cart c, products p, orders o, users u where u.username=c.username and c.pno=p.pno and p.pno=o.pid and o.username='$name' and c.username='$name';";
            $result1 = mysqli_query($conn,$sql1);
            $num = mysqli_num_rows($result1);
            if($num >0){
                $total=0;
                echo '<div class="cart-container">';
                while($row = mysqli_fetch_assoc($result1)){
                    // echo $row['imag'];
                    // echo "<img src='image/product/".$row['imag']."'>";
                    // echo $row['pno'];
                    // echo $row['pname'];
                    // echo $row['price'];
                    // echo "<br>";
                    // echo $row['pno'];
                    // echo $row['username'];
                    // echo $row['quantity'];
                    // echo $row[''];
                    $total = $total + $row['price'];
                    $pid=$row['pno'];
                    echo "<br>";
                    echo '<div class="cart-item">
                    <img src="image/product/'.$row["imag"].'">
                    <div class="cart-details">
                        <h1 class="pad">'.$row["pname"].'</h1>
                        <p class="pad">order id : '.$row["orderid"].'</p>
                        <p class="pad">Price : $ '.$row["price"].'</p>
                        <p class="pad">quantity '.$row["quantity"].'</p>
                        <p class="pad">Order date : '.$row["dt"].'</p>
                        
                    </div>
                    </div>';
                }
                
                echo '</div>';
                
            }
            else{
                echo "No order History";
            }
        }
        else{
            echo "Please login to check the Order History";
        }
    ?>
    <a href="orders.php">Buy</a>
</body>
</html>