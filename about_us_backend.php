<?php
// about.php

include 'navbar.php'; // Include the navbar

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM about_us ORDER BY display_order ASC");
    $stmt->execute();
    $aboutSections = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Rushi Hotel</title>
    <link rel="stylesheet" href="style.css"> <!-- Your main CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
            background-color: #f4f4f4;
        }

        .about-us-content {
            padding: 4rem 5%;
            max-width: 1200px;
            margin: auto;
        }

        .container {
            display: flex;
            align-items: center;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .container:nth-child(even) {
            flex-direction: row-reverse;
        }

        .content-text {
            flex: 1;
        }

        .content-text h2 {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 1rem;
        }

        .content-text p {
            font-size: 1rem;
            line-height: 1.8;
        }

        .content-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .content-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .content-image img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<section class="about-us-content">
    <?php foreach ($aboutSections as $index => $section): ?>
        <div class="container" style="flex-direction: <?= $index % 2 ? 'row-reverse' : 'row'; ?>">
            <div class="content-text">
                <h2><?= htmlspecialchars($section['section_title']); ?></h2>
                <p><?= nl2br(htmlspecialchars($section['section_text'])); ?></p>
            </div>
            <div class="content-image">
                <img src="<?= htmlspecialchars($section['image_path']); ?>" alt="<?= htmlspecialchars($section['section_title']); ?>">
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php include 'footer.php'; ?>

</body>
</html>