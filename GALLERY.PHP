<?php
// --- DATABASE CONNECTION ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // --- FETCH GALLERY ITEMS ---
    $sql = "SELECT * FROM gallery ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $gallery_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "<p style='text-align:center; width:100%; color:red;'>Database error: " . $e->getMessage() . "</p>";
    $gallery_items = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Rushi Hotel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@700&display=swap');
        
        :root {
            --primary-color: #004d40; /* Dark Teal */
            --secondary-color: #ff9800; /* Amber */
            --background-light: #f4f7f9;
            --card-bg: #ffffff;
            --text-dark: #333333;
            --text-light: #ffffff;
            --shadow-light: rgba(0, 0, 0, 0.08);
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px var(--shadow-light);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            text-align: center;
            color: var(--primary-color);
            font-size: 2.2rem;
            margin-top: 0;
            margin-bottom: 2rem;
            position: relative;
        }

        h2::after {
            content: '';
            width: 60px;
            height: 3px;
            background: var(--secondary-color);
            display: block;
            margin: 10px auto 0;
            border-radius: 2px;
        }
        
        /* Gallery Section */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .gallery-item:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .gallery-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3));
            color: var(--text-light);
            padding: 1.5rem;
            transform: translateY(100%);
            transition: transform 0.5s ease;
        }

        .gallery-item:hover .overlay {
            transform: translateY(0);
        }

        .overlay h3 {
            font-family: 'Playfair Display', serif;
            margin: 0 0 0.5rem 0;
            font-size: 1.6rem;
        }

        .overlay p {
            margin: 0 0 1rem 0;
            font-weight: 300;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        /* Mobile First Styles */
        @media (max-width: 768px) {
            h2 {
                font-size: 1.8rem;
            }
            .card {
                padding: 1.5rem;
            }
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            .gallery-item img {
                height: 200px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2><i class="fas fa-images"></i> Rushi Hotel Gallery</h2>
        <div class="gallery-grid">
            <?php
            if (count($gallery_items) > 0) {
                foreach ($gallery_items as $item) {
                    // Corrected image path to use an absolute reference from the server root
                    echo "
                    <div class='gallery-item'>
                        <img src='/uploads/gallery/" . basename($item['image_path']) . "' alt='{$item['title']}'>
                        <div class='overlay'>
                            <h3>{$item['title']}</h3>
                            <p>{$item['description']}</p>
                        </div>
                    </div>";
                }
            } else {
                echo "<p style='text-align:center; width:100%; color:#888;'>No gallery images found.</p>";
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- what are the problem  -->