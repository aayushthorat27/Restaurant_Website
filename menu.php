<?php
session_start();

include "connection.php";

$finaltotal = $_POST['billamt'];
$order_id = $_SESSION['order_id'];
echo "amt=";
echo $finaltotal;

$stmt = $conn->prepare("UPDATE orders SET total_amt = ? where order_id = ? ");
$stmt->bind_param("ii", $finaltotal, $order_id);
$stmt->execute();
$stmt->close();
?>