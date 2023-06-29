<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    
    include 'connection.php';

    echo ".";
    $loginSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Prepare the SQL query
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        
        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            $loginSuccess = true;
        }

        if($loginSuccess){
            $row = $result->fetch_assoc();
            $logged_in_username = $row["username"];

            session_start();
            $_SESSION['logged_in_username'] = $logged_in_username;
            
            header("Location: option.php");
        } else {
            $loginSuccess = false;
        }
    }
} 
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
    </head>
    <body>
        <div class="logo">
            <img src="https://i.ibb.co/XfBtyZR/1683254736138.jpg" alt="Hotel image">
        </div>

        <div class="login">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <label for="Username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Username"><br><br>

                <label for="Password">Password:&nbsp;</label>
                <input type="password" name="password" id="password" placeholder="Password"><br><br>
                
                <button class="button">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset" >Reset</button><br><br>
            </form>
            <a href="pbl_index.php" target="_blank">Click here to create new user</a>
        </div>
        <script>
            <?php
            echo " var loginSuccess= ". ($loginSuccess ? "true" : "false") . ";";
            ?>

            if(!loginSuccess){
                alert("Invalid Username or Password! Please try again!");
            }
        </script>
    </body>
</html>

