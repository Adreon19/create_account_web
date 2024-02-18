<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_profile WHERE username = '$username'OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('username or email has been taken'); </script>";
    }
    else{
        if($password == $conpassword){
          $query = "INSERT INTO tb_profile VALUES('', '$name', '$username', '$email', '$password')";  
          mysqli_query($conn,$query);
          echo
          "<script> alert('success'); </script>";
        }
        else{
            echo
            "<script> alert('Password does not match'); </script>";
    
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name  :</label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="username">Username  :</label>
        <input type="text" name="username" id="username" required value=""> <br>
        <label for="email">Email  :</label>
        <input type="email" name="email" id="email" required value=""> <br>
        <label for="password">Password  :</label>
        <input type="password" name="password" id="password" required value=""> <br>
        <label for="conpassword">Confirm Password  :</label>
        <input type="password" name="conpassword" id="conpassword" required value=""> <br>
        <button type="submit" name="submit">Register!</button>
    </form>
    <br>
    <a href="login.php">Login</a>
</body>
</html>