<?php
    $error = false;
    $success = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "_dbconnect.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        
        if($password == $cpassword){
            $check = "select * from users where username='$username'";
            $result = mysqli_query($conn,$check);
            $row = mysqli_num_rows($result);
            if($row==0){
                $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp());";
                $result = mysqli_query($conn,$sql);
                $success = true;
            }
            else{
                $error = "username already exists";
            }
        }
        else{
            $error = "passwords doesn't match";
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
</head>
<body>
    <?php
        require "nav.php";
        if($error){
            echo $error;
        }
        if($success){
            echo "Sign in successful";
        }
    ?>
    <div class="signup-container">
        <form action="/shoes/signup.php" method="post">
        <div class="con-center">
            <h1 class="top-heading">Sign up</h1>
            <input type="text" class="text-input" placeholder="username" name="username" id="username">
            <input type="password" class="text-input" placeholder="password" name="password" id="password">
            <input type="password" class="text-input" placeholder="confirm password" name="cpassword" id="cpassword">
            <button type="submit" class="submit-button">Sign in</button>
        </div>
        </form>
    </div>
</body>
</html>