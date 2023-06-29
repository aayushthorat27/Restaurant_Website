<?php

$insert = false;
if(isset($_POST['username'])){
    include 'connection.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * from users WHERE username = '$username'";
    $result = $conn->query($sql);

    if($result -> num_rows == 1){
        echo "<script> alert('Username already exists! Please try another one!')</script>";
    } else{
        $sql = "INSERT INTO users (username ,password) VALUES ('$username','$password');";

        if($conn->query($sql) === true){
            //echo "Successfully inserted";
            $insert=true;
        }
        else{
            echo "ERROR: $sql <br> $conn->error";
        }    
    } 
    $conn->close();
}
?>



<!DOCTYPE HTML> 
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        New User page 
    </title>
    <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="logo">
            <img src="https://i.ibb.co/XfBtyZR/1683254736138.jpg" alt="Hotel image" width="250px">
        </div>

        <div class="login">
            <h1>New user</h1>

            <?php
            if($insert == true){
                header("location: login.php");
            }?>

            <form action="pbl_index.php" method="post">
                <label for="Username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter your username"><br><br>

                <label for="Password">Password:&nbsp;</label>
                <input type="password" name="password" id="password" placeholder="Enter your password"><br><br>

                <button class="button" >Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset">Reset</button>

            </form>
        </div>
    </body> 
</html>
