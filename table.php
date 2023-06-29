<?php
session_start();

if(isset($_SESSION['order_id'])){
    include 'connection.php';

    $tableId = $_POST['tableId'];
    $order_id = $_SESSION['order_id'];
    $username = $_SESSION['logged_in_username'];
    
    $stmt = $conn->prepare('UPDATE orders SET tableId= ? WHERE order_id = ?');
    $stmt->bind_param('is', $tableId, $order_id);
    $stmt->execute(); 
    $stmt->close();

    $_SESSION['tableId'] = $tableId;
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Table Page</title>
        <link rel="stylesheet" href="Table.css">
    </head>
    <body>
        <nav>
            <img src="https://i.ibb.co/XfBtyZR/1683254736138.jpg" class="logo">
            <a href="t">Home</a>
            <a href="option.php">Back</a>
            <img src="https://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png" class="user_logo">
            <a href="login.php" class="logout">Logout</a>
        </nav>
        <br><br><br><br><br>
        <form action = "table.php" method = "POST">
            <img src="My project.png" width="40%" height="80%">
            
            <div class="table1" id=1 >
            <p>&nbsp;</p>
            </div>
            <div class="table2" id=2 >
                    <p>&nbsp;</p>
            </div>
            <div class="table3" id=3 >
                    <p>&nbsp;</p>
            </div>
            <div class="table4" id=4 >
                    <p>&nbsp;</p>
            </div>
            <div class="table5" id=5 >
                    <p>&nbsp;</p>
            </div>
            <div class="table6" id=6 >
                    <p>&nbsp;</p>
            </div>
            <div class="table7" id=7 >
                    <p>&nbsp;</p>
            </div>
            <div class="table8" id=8 >
                    <p>&nbsp;</p>
            </div>
            <div class="table9" id=9 >
                    <p>&nbsp;</p>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function(){
                    $('.table1, .table2, .table3, .table4, .table5, .table6, .table7, .table8, .table9').click(function(){
                        var tableId = $(this).attr('id');

                        $.ajax({
                            type:"POST",
                            url: "table.php",
                            data: {tableId: tableId},
                            success:function(response){
                                window.location.href = 'MENU.html';
                            }
                        });
                    });
                });
            </script>
        </form>
    </body>
</html>
