<?php
session_start();

if(isset($_SESSION['logged_in_username'])){

    include 'connection.php';

    $logged_in_username = $_SESSION['logged_in_username'];
    echo ".";
     
    $stmt = null;
    $order_id=null;
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $choice = $_POST['choice'];
        echo "$choice";


        $stmt = $conn->prepare('INSERT INTO orders (username,choice) VALUES (?,?)');
        $stmt->bind_param('ss', $logged_in_username, $choice);
        $stmt->execute();
        $order_id = $conn->insert_id;
        $stmt->close();

        $_SESSION['order_id'] = $order_id;
    
    }
}else{
    echo "Error in executing the program!";
}
$conn->close();

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Option Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="option.css">
    </head>
    <body>
        <div class="whitespace">
            <h1>Select The Type of Service You Wish</h1>
        </div>
        <div class="waiter" >
            <img id="waiter"  src="data:image/png;base64,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" alt="Waiter Service" />
            <br> Waiter Service
        </div> 

        <div class="waiterless">
            <img id = "waiterless" src="https://www.freeiconspng.com/thumbs/computer-user-icon/computer-user-icon-28.png" alt="Self-Service" />
            <br> Self-Service
        </div>
         
        <script>
        // Handle image click event
            $(document).ready(function() {
                $('#waiter, #waiterless').on('click', function() {
                    var choice = $(this).attr('id'); // Get the ID of the clicked image

                    // Send the selected service type to the server
                    $.ajax({
                        type: 'POST',
                        url: 'option.php',
                        data: { choice: choice },
                        success: function(response) {
                            // Redirect to the next page
                            
                           window.location.href = 'table.php';
                        }
                    });
                });
            });
        </script>

    </body>
</html>