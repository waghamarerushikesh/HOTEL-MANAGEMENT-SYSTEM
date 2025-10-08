<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Listings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: linear-gradient(90deg, #e3f2fd 0%, #bbdefb 100%); 
            margin: 0; 
            padding: 0; 
            color: #333;
            box-sizing: border-box; 
        }
        *, *::before, *::after {
            box-sizing: inherit;
        }
        .page-layout { 
            display: flex; 
            justify-content: center; 
            gap: 30px; 
            padding: 20px; 
        }
        .main-content { 
            flex-grow: 1; 
            max-width: 800px; 
        }
        .container {
            display: flex; 
            flex-direction: column; 
            gap: 20px; 
            padding: 0;
        }
        .hotel-box { 
            width: 100%; 
            height: 200px; 
            background-color: white;
            border-radius: 12px; 
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); 
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; 
            display: flex; 
        }
        .hotel-box:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); 
        }
        .hotel-box img { 
            width: 250px; 
            height: 100%; 
            object-fit: cover; 
            display: block; 
        }
        .hotel-info { 
            padding: 1.5rem; 
            flex-grow: 1; 
            display: flex; 
            flex-direction: column; 
            justify-content: space-between; 
        }
        .hotel-name { 
            margin-top: 0; 
            color: #0f2027; 
        }
        .hotel-desc { 
            color: #555; 
            font-size: 0.95rem; 
            line-height: 1.5; 
            margin-bottom: auto; 
        }
        .hotel-details { 
            margin-top: 1rem; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            flex-wrap: wrap;
        }
        .hotel-details .price { 
            font-size: 1.2rem; 
            font-weight: bold; 
            color: #2c5364; 
            margin-right: 15px; 
        }
        .hotel-details .rating { 
            color: gold; 
        }
        .view-deal-btn { 
            background-color: #43cea2; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            text-decoration: none; 
            font-weight: bold; 
            transition: background-color 0.3s, transform 0.2s; 
            text-align: center; 
            cursor: pointer; 
            white-space: nowrap;
        }
        .view-deal-btn:hover { 
            background-color: #3aa382; 
            transform: scale(1.05); 
        }
        .sidebar { 
            width: 250px; 
            padding: 20px; 
            background: linear-gradient(90deg, #0f2027 0%, #2c5364 50%, #43cea2 100%); 
            border-radius: 12px; 
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); 
            font-family: Arial, sans-serif; 
            height: fit-content; 
            position: sticky; 
            top: 20px; 
        }
        .sidebar h2, .sidebar h3 { 
            color: white; 
            margin-top: 0; 
            margin-bottom: 15px; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.3); 
            padding-bottom: 10px; 
        }
        .filter-nav ul { 
            list-style-type: none; 
            margin: 0; 
            padding: 0; 
            margin-bottom: 20px; 
        }
        .filter-nav ul li a { 
            display: block; 
            padding: 10px 15px; 
            color: white; 
            text-decoration: none; 
            border-radius: 5px; 
            transition: background-color 0.3s, color 0.3s; 
        }
        .filter-nav ul li a:hover { 
            background-color: rgba(255, 255, 255, 0.1); 
            color: white; 
        }
        .filter-nav ul li a.active { 
            background-color: #4CAF50; 
            color: white; 
            font-weight: bold; 
        }
        .filter-nav ul li a i { 
            margin-right: 10px; 
            color: white; 
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .page-layout {
                flex-direction: column;
                gap: 20px;
            }
            .sidebar {
                width: 100%;
                position: static;
                margin-bottom: 20px;
            }
            .main-content {
                max-width: 100%;
            }
        }
        @media (max-width: 600px) {
            .hotel-box {
                flex-direction: column;
                height: auto;
            }
            .hotel-box img {
                width: 100%;
                height: 180px;
            }
            .hotel-info {
                padding: 1rem;
            }
            .hotel-name {
                font-size: 1.2rem;
            }
            .hotel-desc {
                font-size: 0.9rem;
            }
            .hotel-details {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .hotel-details .price,
            .hotel-details .rating {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>

<?php
// --- Database Connection ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// --- Star Rating Function ---
function generateStars($rating) {
    $stars = str_repeat("★", floor($rating));
    $stars .= str_repeat("☆", 5 - floor($rating));
    return $stars;
}

// --- Apply Filters ---
$sql = "SELECT * FROM hotel_listings";
$params = [];
$whereClause = [];

if (isset($_GET['bed_type'])) {
    $whereClause[] = "description LIKE ?";
    $params[] = "%" . $_GET['bed_type'] . "%";
} elseif (isset($_GET['amenity'])) {
    $whereClause[] = "description LIKE ?";
    $params[] = "%" . $_GET['amenity'] . "%";
} elseif (isset($_GET['price'])) {
    $price = $_GET['price'];
    if ($price == "under-100") {
        $whereClause[] = "price_per_night <= 100";
    } elseif ($price == "101-200") {
        $whereClause[] = "price_per_night BETWEEN 101 AND 200";
    } elseif ($price == "201-300") {
        $whereClause[] = "price_per_night BETWEEN 201 AND 300";
    } elseif ($price == "over-300") {
        $whereClause[] = "price_per_night > 300";
    }
}

if (!empty($whereClause)) {
    $sql .= " WHERE " . implode(" AND ", $whereClause);
}

$sql .= " ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="page-layout">
  <aside class="sidebar">
    <h2>Filter by Room</h2>
    <nav class="filter-nav">
      <ul>
        <li><a href="?bed_type=Single Bed"><i class="fas fa-bed"></i> Single Bed</a></li>
        <li><a href="?bed_type=Double Bed"><i class="fas fa-bed"></i> Double Bed</a></li>
        <li><a href="?bed_type=King Bed"><i class="fas fa-bed"></i> King Bed</a></li>
      </ul>
      <h3>Amenities</h3>
      <ul>
        <li><a href="?amenity=Balcony"><i class="fas fa-camera"></i> Balcony</a></li>
        <li><a href="?amenity=Jacuzzi"><i class="fas fa-bath"></i> Jacuzzi</a></li>
        <li><a href="?amenity=Ocean View"><i class="fas fa-water"></i> Ocean View</a></li>
      </ul>
      <h3>Price</h3>
      <ul>
        <li><a href="?price=under-100">Under $100</a></li>
        <li><a href="?price=101-200">$101 - $200</a></li>
        <li><a href="?price=201-300">$201 - $300</a></li>
        <li><a href="?price=over-300">Over $300</a></li>
      </ul>
    </nav>
  </aside>
<!-- this is rooms.php in the sets of the -->
  <main class="main-content">
    <div class="container">
      <?php if ($hotels): ?>
        <?php foreach ($hotels as $hotel): ?>
          <?php
          $imageSrc = !empty($hotel['image_path']) && file_exists($hotel['image_path']) ? htmlspecialchars($hotel['image_path']) : 'https://via.placeholder.com/300x200?text=No+Image';
          ?>
          <div class="hotel-box">
            <img src="<?= $imageSrc; ?>" alt="<?= htmlspecialchars($hotel['hotel_name']); ?>">
            <div class="hotel-info">
              <h2 class="hotel-name"><?= htmlspecialchars($hotel['hotel_name']); ?></h2>
              <p class="hotel-desc"><?= htmlspecialchars($hotel['description']); ?></p>
              <div class="hotel-details">
                <p class="price">$<?= number_format($hotel['price_per_night'], 2); ?> / night</p>
                <p class="rating"><?= generateStars($hotel['rating']); ?></p>
                <a href="thebookingdata.php?id=<?= $hotel['id']; ?>" class="view-deal-btn">View Deal</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No hotels found.</p>
      <?php endif; ?>
    </div>
  </main>
</div>

</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Listings Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --background-light: #f4f7f9;
            --background-dark: #ecf0f1;
            --card-bg: #ffffff;
            --text-dark: #2c3e50;
            --text-light: #ecf0f1;
            --border-color: #dfe6e9;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
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
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px var(--shadow-light);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px var(--shadow-medium);
        }
        h2 {
            text-align: center;
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 500;
            font-size: 1.8rem;
        }
        form .form-group {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        form input, form textarea, form select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box;
        }
        form input:focus, form textarea:focus, form select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }
        form textarea {
            resize: vertical;
            min-height: 100px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            color: var(--text-light);
            text-align: center;
        }
        .btn-submit {
            width: 100%;
            background-color: var(--secondary-color);
        }
        .btn-submit:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        .btn-delete {
            background-color: var(--accent-color);
        }
        .btn-delete:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }
        .btn-update {
            background-color: #27ae60;
        }
        .btn-update:hover {
            background-color: #2ecc71;
            transform: translateY(-2px);
        }
        .hotel-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        .hotel-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 12px var(--shadow-light);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px var(--shadow-medium);
        }
        .hotel-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            transition: transform 0.3s ease;
        }
        .hotel-card:hover img {
            transform: scale(1.05);
        }
        .hotel-info {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .hotel-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--primary-color);
        }
        .hotel-rating {
            color: #f1c40f;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .hotel-description {
            font-size: 0.95rem;
            color: #555;
            line-height: 1.5;
            margin-bottom: 15px;
            flex-grow: 1;
        }
        .hotel-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        .hotel-actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .hotel-actions .btn {
            flex-grow: 1;
            padding: 10px;
        }
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
            .hotel-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2><i class="fas fa-hotel"></i> Add / Update Hotel</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hotel_id" id="hotel_id">
            
            <div class="form-group">
                <label for="hotel_name"><i class="fas fa-signature"></i> Hotel Name</label>
                <input type="text" id="hotel_name" name="hotel_name" placeholder="Enter hotel name" required>
            </div>

            <div class="form-group">
                <label for="description"><i class="fas fa-align-left"></i> Description</label>
                <textarea id="description" name="description" placeholder="Write a brief description..." required></textarea>
            </div>

            <div class="form-group">
                <label for="price_per_night"><i class="fas fa-dollar-sign"></i> Price per Night ($)</label>
                <input type="number" id="price_per_night" name="price_per_night" min="1" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="rating"><i class="fas fa-star"></i> Rating (1-5)</label>
                <select id="rating" name="rating" required>
                    <option value="">Select Rating</option>
                    <option value="1">★☆☆☆☆ (1)</option>
                    <option value="2">★★☆☆☆ (2)</option>
                    <option value="3">★★★☆☆ (3)</option>
                    <option value="4">★★★★☆ (4)</option>
                    <option value="5">★★★★★ (5)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Hotel Image</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-submit"><i class="fas fa-save"></i> Save Hotel</button>
        </form>
    </div>

    <div class="card">
        <h2><i class="fas fa-list-ul"></i> All Hotel Listings</h2>
        <div class="hotel-list">
            <?php
            // --- DATABASE CONNECTION ---
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hotel_db";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // --- HANDLE DELETE ---
                if (isset($_POST['delete_id'])) {
                    $delete_id = $_POST['delete_id'];
                    $stmt = $conn->prepare("DELETE FROM hotel_listings WHERE id=:id");
                    $stmt->bindParam(':id', $delete_id);
                    $stmt->execute();
                }

                // --- HANDLE INSERT / UPDATE ---
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hotel_name'])) {
                    $hotel_id = $_POST['hotel_id'];
                    $hotel_name = $_POST['hotel_name'];
                    $description = $_POST['description'];
                    $price_per_night = $_POST['price_per_night'];
                    $rating = $_POST['rating'];

                    // Handle image upload if provided
                    $targetDir = "uploads/hotels/";
                    // Create directory if it doesn't exist
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }

                    $image_path = null;
                    if (!empty($_FILES["image"]["name"])) {
                        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
                        $targetFilePath = $targetDir . $imageName;
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                            $image_path = $targetFilePath;
                        } else {
                            echo "<p style='color:red;'>Error uploading image.</p>";
                        }
                    }

                    if ($hotel_id) {
                        // Update hotel
                        if ($image_path) {
                            $sql = "UPDATE hotel_listings SET hotel_name=:hotel_name, description=:description, price_per_night=:price, rating=:rating, image_path=:image WHERE id=:id";
                        } else {
                            $sql = "UPDATE hotel_listings SET hotel_name=:hotel_name, description=:description, price_per_night=:price, rating=:rating WHERE id=:id";
                        }
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':hotel_name', $hotel_name);
                        $stmt->bindParam(':description', $description);
                        $stmt->bindParam(':price', $price_per_night);
                        $stmt->bindParam(':rating', $rating);
                        if ($image_path) $stmt->bindParam(':image', $image_path);
                        $stmt->bindParam(':id', $hotel_id);
                        $stmt->execute();
                    } else {
                        // Insert new hotel
                        $sql = "INSERT INTO hotel_listings (hotel_name, description, price_per_night, rating, image_path) 
                                VALUES (:hotel_name, :description, :price, :rating, :image)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':hotel_name', $hotel_name);
                        $stmt->bindParam(':description', $description);
                        $stmt->bindParam(':price', $price_per_night);
                        $stmt->bindParam(':rating', $rating);
                        $stmt->bindParam(':image', $image_path);
                        $stmt->execute();
                    }
                }

                // --- FETCH ALL HOTELS ---
                $sql = "SELECT * FROM hotel_listings ORDER BY id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($hotels) > 0) {
                    foreach ($hotels as $hotel) {
                        $ratingStars = str_repeat("★", $hotel['rating']) . str_repeat("☆", 5 - $hotel['rating']);
                        // Set a default image if the path is empty or file doesn't exist
                        $imageSrc = !empty($hotel['image_path']) && file_exists($hotel['image_path']) ? htmlspecialchars($hotel['image_path']) : 'https://via.placeholder.com/300x200?text=No+Image+Available';
                        
                        echo "
                        <div class='hotel-card'>
                            <img src='{$imageSrc}' alt='Image of {$hotel['hotel_name']}'>
                            <div class='hotel-info'>
                                <div class='hotel-name'>{$hotel['hotel_name']}</div>
                                <div class='hotel-rating'>{$ratingStars}</div>
                                <div class='hotel-description'>{$hotel['description']}</div>
                                <div class='hotel-price'>\${$hotel['price_per_night']}/night</div>
                                <div class='hotel-actions'>
                                    <form method='POST' style='margin:0;'>
                                        <input type='hidden' name='delete_id' value='{$hotel['id']}'>
                                        <button type='submit' class='btn btn-delete'><i class='fas fa-trash-alt'></i> Delete</button>
                                    </form>
                                    <button class='btn btn-update' onclick=\"fillForm('{$hotel['id']}', '{$hotel['hotel_name']}', '{$hotel['description']}', '{$hotel['price_per_night']}', '{$hotel['rating']}')\"><i class='fas fa-edit'></i> Update</button>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p style='text-align:center; width:100%; color:#888;'>No hotel listings found.</p>";
                }
            } catch (PDOException $e) {
                echo "<p style='text-align:center; width:100%; color:red;'>Database error: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </div>
</div>

<script>
function fillForm(id, name, desc, price, rating) {
    document.getElementById('hotel_id').value = id;
    document.getElementById('hotel_name').value = name;
    document.getElementById('description').value = desc;
    document.getElementById('price_per_night').value = price;
    document.getElementById('rating').value = rating;
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>

</body>
</html>