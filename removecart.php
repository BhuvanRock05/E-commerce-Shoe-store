<?php
    echo "heloooooo";
    require "_dbconnect.php";
    if(isset($_GET['removeid'])){
        $id = $_GET['removeid'];
        session_start();
        $name = $_SESSION["username"];
        $sql = "delete from `cart` where pno='$id' and username='$name'";
        $result = mysqli_query($conn,$sql);
        header("location: cart.php");
    }
?>