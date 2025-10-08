<?php
session_start();
include "../backend/db-connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["role"] = $row["role"];

            // Redirect based on role
            if ($row["role"] === "admin") {
                header("Location: ../backend/admin.php");
            } elseif ($row["role"] === "staff") {
                header("Location: ../backend/staff.php");
            } elseif ($row["role"] === "customer" || $row["role"] === "user") {
                header("Location: ../frontend/thehomepage.php");
            } else {
                echo "<script>alert('Unknown role ❌');</script>";
            }
            exit();
        } else {
            echo "<script>alert('Invalid password ❌');</script>";
        }
    } else {
        echo "<script>alert('Account not found ❌'); </script>";
    }
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

 <!-- Save as: user-login.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: linear-gradient(135deg, #43cea2, #185a9d);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .login-container {
            max-width: 350px;
            margin: 70px auto;
            background: #fff;
            padding: 32px 24px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(24,90,157,0.15);
        }
        h2 {
            text-align: center;
            color: #185a9d;
            margin-bottom: 28px;
            letter-spacing: 1px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 500;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #b2bec3;
            border-radius: 8px;
            font-size: 16px;
            background: #f7f9fa;
            transition: border-color 0.2s;
        }
        input:focus {
            border-color: #43cea2;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(24,90,157,0.08);
          
        }
        button:hover {
            background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
        }
        .message {
            text-align: center;
            margin-bottom: 16px;
            font-size: 15px;
            color: #d8000c;
        }
        @media (max-width: 500px) {
            .login-container {
                padding: 18px 8px;
            }
            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to Your Account</h2>
        <form action="../backend/user-login.php" method="POST" autocomplete="off">
            <div class="message" id="message"></div>
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required minlength="6">

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>



