<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "_dbconnect.php";
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        session_start();
        $name = $_SESSION["username"];
        $sql1 = "select pno from `cart` where username='$name'";
        $result1 = mysqli_query($conn,$sql1);
        $num = mysqli_num_rows($result1);
        if($num >0){
            while($row = mysqli_fetch_assoc($result1)){
                // echo $row['pno'];
                $pno = $row['pno'];
                $sql = "INSERT INTO `orders` (`username`, `address`, `phone`, `pid`, `dt`, `email`) VALUES ('$name', '$address', '$phone', '$pno', current_timestamp(), '$email');";
                $result = mysqli_query($conn,$sql);
            }
        }
        header("location: orders.php");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buy.css">
    <link rel="stylesheet" href="signup.css">
    <title>Document</title>
    <style>
        input[type="email"]::-webkit-input-placeholder{
            color: white;
            opacity: 1;
        }
        .text-input{
            border-radius: 0px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <form action="/shoes/buy.php" method="post">
            <div class="con-center">
                <h1>Enter Detials</h1>
                <input type="email" class="text-input" required placeholder="Enter Email" name="email" id="email">
                <input type="text" class="text-input" required placeholder="Enter Phone" name="phone" id="phone">
                <input type="text" class="text-input" required placeholder="Enter Address" name="address" id="address">
                <input type="submit" class="submit-button" value="Buy now">
            </div>
        </form>
    </div>
</body>
</html>