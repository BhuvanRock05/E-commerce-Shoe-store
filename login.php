<?php
    $error = false;
    $success = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "_dbconnect.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $sql = "Select * from users where username='$username' and password='$password';";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
            header("location: welcome.php");
        }
        else{
            $error = true;
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Document</title>
    <style>
        .submit-button{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
        require "nav.php";
        if($error){
            echo "invalid credentials";
        }
        
    ?>
    <div class="signup-container">
        <form action="/shoes/login.php" method="post">
            <div class="con-center">
                <h1 class="top-heading">Login</h1>
                <input type="text" class="text-input" placeholder="username" name="username" id="username">
                <input type="text" class="text-input" placeholder="password" name="password" id="password">
                <button type="submit" class="submit-button">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>