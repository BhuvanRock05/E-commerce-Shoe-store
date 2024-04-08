<?php
    require "_dbconnect.php";
    session_start();
    if(isset($_SESSION['loggedin'])){
        $name = $_SESSION["username"];
        if(isset($_GET['addid'])){
            $id = $_GET['addid'];
            
            $sql1 = "select pno from `cart` where pno='$id' and username='$name'";
            $result1 = mysqli_query($conn,$sql1);
            $num = mysqli_num_rows($result1);
            echo $num;
            if ($num <= 0){
                $sql = "INSERT INTO `cart` (`pno`, `username`, `quantity`) VALUES ('$id', '$name', '1');";
                $result = mysqli_query($conn,$sql);
                header("location: products.php");
            }
            else{
                echo "product already in cart";
                header("location: products.php");
            }
        }
    }
    else{
        echo'<script>alert("Please log in to continue")</script>';
        header("location: products.php");
    }
?>
