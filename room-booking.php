<?php
session_start();
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["role"] == "customer") {
    $user_id = $_SESSION["user_id"];
    $room_id = $_POST["room_id"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];
    $status = "pending";

    $sql = "INSERT INTO bookings (user_id, room_id, check_in_date, check_out_date, status)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisss", $user_id, $room_id, $check_in, $check_out, $status);
    $stmt->execute();

    echo "Booking requested!";
}
?>