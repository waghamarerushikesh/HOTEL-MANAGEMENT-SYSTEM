
<!-- Save as: user-registration.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: linear-gradient(135deg, #43cea2, #185a9d);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 60px auto;
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
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #b2bec3;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.2s;
            background: #f7f9fa;
        }
        input:focus, select:focus {
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
            /* transition: background 0.2s; */
        }
        button:hover {
            background: linear-gradient(90deg, #185a9d 0%, #3a6155ff 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Account</h2>
        <form action="../backend/user-registration.php" method="POST" autocomplete="off">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required minlength="6">

            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="">Select role</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="customer">Customer</option>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>

<?php

include "../backend/db-connection.php"; // Ensure this file contains the database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"]; // admin/staff/customer

    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Use $name (not $name2)
    $stmt->bind_param("ssss", $name, $email, $pass, $role);

    if ($stmt->execute()) {
        if ($role === "admin") {
            header("Location: ../backend/admin.php");
            exit();
        } else {
            echo "<script>alert('Registered successfully!');</script>";
        }
    } else {
        echo "Registration failed: " . $stmt->error;
    }
    $stmt->close();
}


?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php

include "../backend/db-connection.php"; // Adjust path if needed

$sql = "SELECT user_id, name, email, role FROM users ORDER BY user_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Users</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f4f7;
      padding: 40px;
    }
    table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    th, td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #185a9d;
      color: #fff;
    }
    tr:hover {
      background-color: #f1f9ff;
    }
    caption {
      caption-side: top;
      text-align: center;
      font-size: 24px;
      margin-bottom: 12px;
      font-weight: bold;
      color: #185a9d;
    }
  </style>
</head>
<body>

</body>
</html>



