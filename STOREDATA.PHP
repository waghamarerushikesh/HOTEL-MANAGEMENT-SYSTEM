<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Hotel Listing</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(120deg, #e0f7fa, #80deea);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .form-container {
      background: #fff;
      padding: 25px 30px;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 600px;
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #0f2027;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
      color: #333;
    }
    .form-group input, 
    .form-group textarea, 
    .form-group select {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      border-color: #43cea2;
      outline: none;
    }
    .form-group textarea {
      resize: vertical;
      min-height: 80px;
    }
    .btn-submit {
      width: 100%;
      background: #43cea2;
      color: #fff;
      font-size: 1rem;
      font-weight: bold;
      padding: 12px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .btn-submit:hover {
      background: #2c5364;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2><i class="fas fa-hotel"></i> Add Hotel Listing</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      
      <div class="form-group">
        <label for="hotel_name">Hotel Name</label>
        <input type="text" id="hotel_name" name="hotel_name" placeholder="Enter hotel name" required>
      </div>

      <div class="form-group">
        <label for="description">Hotel Description</label>
        <textarea id="description" name="description" placeholder="Write a short description..." required></textarea>
      </div>

      <div class="form-group">
        <label for="price_per_night">Price per Night ($)</label>
        <input type="number" id="price_per_night" name="price_per_night" min="1" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="rating">Rating (0–5)</label>
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
        <label for="image">Hotel Image</label>
        <input type="file" id="image" name="image" accept="image/*" required>
      </div>

      <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Save Hotel</button>
    </form>
  </div>

</body>
</html>

<!-- THE PHP CODE INSERT THE DATA FROM THE ADMIN -->
 <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hotel_name = $_POST['hotel_name'];
        $description = $_POST['description'];
        $price_per_night = $_POST['price_per_night'];
        $rating = $_POST['rating'];

        // Handle image upload
        $targetDir = "../uploads/hotels/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Create directory if it doesn’t exist
        }

        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $imageName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insert into database
            $sql = "INSERT INTO hotel_listings (hotel_name, description, price_per_night, rating, image_path)
                    VALUES (:hotel_name, :description, :price_per_night, :rating, :image_path)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':hotel_name', $hotel_name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price_per_night', $price_per_night);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':image_path', $targetFilePath);

            if ($stmt->execute()) {
                echo "<script>alert('Hotel added successfully!'); window.location.href='hotel_insert_form.php';</script>";
            } else {
                echo "Error inserting hotel.";
            }
        } else {
            echo "Error uploading image.";
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>


<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM hotel_listings ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!-- THIS IS A NEW CODE BLOCK -->
 

<!-- THIS IS A NEW CODE  -->
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
        }
        .hotel-details .price { 
            font-size: 1.2rem; 
            font-weight: bold; 
            color: #2c5364; 
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
    </style>
</head>
<body>

<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to generate star rating HTML
function generateStars($rating) {
    $stars = '';
    $full_stars = floor($rating);
    $empty_stars = 5 - $full_stars;

    for ($i = 0; $i < $full_stars; $i++) {
        $stars .= '★';
    }
    for ($i = 0; $i < $empty_stars; $i++) {
        $stars .= '☆';
    }
    return $stars;
}

// Fetch all hotels from the database
$sql = "SELECT * FROM hotel_listings ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="page-layout">
    <aside class="sidebar">
        <h2>Filter by Room Features</h2>
        <nav class="filter-nav">
            <ul>
                <li><a href="#single-bed"><i class="fas fa-bed"></i> Single Bed</a></li>
                <li><a href="#double-bed"><i class="fas fa-bed"></i> Double Bed</a></li>
                <li><a href="#king-bed"><i class="fas fa-bed"></i> King Bed</a></li>
            </ul>
            <h3>Amenities</h3>
            <ul>
                <li><a href="#balcony"><i class="fas fa-camera"></i> Private Balcony</a></li>
                <li><a href="#jacuzzi"><i class="fas fa-bath"></i> Jacuzzi</a></li>
                <li><a href="#ocean-view"><i class="fas fa-water"></i> Ocean View</a></li>
            </ul>
            <h3>Price Range</h3>
            <ul>
                <li><a href="#under-100">$100 and under</a></li>
                <li><a href="#101-200">$101 - $200</a></li>
                <li><a href="#201-300">$201 - $300</a></li>
                <li><a href="#over-300">Over $300</a></li>
            </ul>
        </nav>
    </aside>

    <div class="main-content">
        <div class="container">
            <?php
            if ($hotels) {
                foreach ($hotels as $hotel) {
            ?>
                    <div class="hotel-box" id="hotel-<?php echo htmlspecialchars($hotel['id']); ?>">
                        <img src="<?php echo htmlspecialchars($hotel['image_path']); ?>" alt="<?php echo htmlspecialchars($hotel['hotel_name']); ?>">
                        <div class="hotel-info">
                            <h2 class="hotel-name"><?php echo htmlspecialchars($hotel['hotel_name']); ?></h2>
                            <p class="hotel-desc"><?php echo htmlspecialchars($hotel['description']); ?></p>
                            <div class="hotel-details">
                                <p class="price"><strong>Price:</strong> $<?php echo htmlspecialchars(number_format($hotel['price_per_night'], 2)); ?> per night</p>
                                <p class="rating"><?php echo generateStars($hotel['rating']); ?></p>
                                <a href="thebookingdata.php?id=<?php echo htmlspecialchars($hotel['id']); ?>" class="view-deal-btn">View Deal</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div>No hotels found.</div>";
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- this is a main thing in the database -->
 