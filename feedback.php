<?php

session_start();

include "connection.php";
$insert=false;
echo ".";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $order_id = $_SESSION['order_id'];
    $feedback = $_POST['feedback'];
    echo".";

    $stmt = $conn->prepare("UPDATE orders SET feedback = ? where order_id = ? ");
    $stmt->bind_param("si", $feedback, $order_id);
    $stmt->execute();

    if($stmt->execute()){
        $insert=true;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>
            Feedback Page
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <div class="logo">
            <img src="https://i.ibb.co/XfBtyZR/1683254736138.jpg" alt="Hotel Image" >
        </div>
        <div class="forum"> 
            <form action="feedback.php" method="POST">
                <h1>Feedback Page</h1>
<!--                 <label for="name">Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" ><br><br> -->
                <label for="Mobile No.">Mobile No.</label>
                <input type="number" pattern="[0-9]{10}" placeholder="Mobile No."><br><br>
                <label for="Performance">Rate Our Service:<br>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>  
                <br><br>
                </label>
<!--                 <label for="Occassion">Occassion:</label>
                <input type="text"><br><br>    -->
                <label for="Feedback">Feedback:</label>
                <input type="text" name="feedback" id="feedback" placeholder="Message..."><br><br>
<!--            <label for="Email">Email ID: &nbsp;</label>
                <input type="email"><br><br> -->
                &nbsp;
                &nbsp;
                <button type="submit">Submit</button>&nbsp;&nbsp;
                <button type="reset">Reset</button><br><br>

                <?php
                if($insert == true){
                    echo "Thank You. Please Visit Again!";
                }
                ?>
            </form>
        </div>
    </body>
</html>