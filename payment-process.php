<?php
session_start();
include "db-connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST["booking_id"];
    $amount = $_POST["amount"];
    $method = $_POST["method"];
    $date = date("Y-m-d");

    $sql = "INSERT INTO payments (booking_id, amount, payment_date, method)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idss", $booking_id, $amount, $date, $method);
    $stmt->execute();

    echo "Payment recorded!";
}
?>