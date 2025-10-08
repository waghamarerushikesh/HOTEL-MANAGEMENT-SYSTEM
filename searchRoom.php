<!-- Bootstrap 5 CSS (if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- Flatpickr CSS for date picker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">

<form class="search-bar row g-3 align-items-center mb-4 mx-auto" style="max-width:1000px;">
  <div class="col-12 col-md-4">
    <div class="input-group input-group-lg">
      <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
      <input type="text" class="form-control" placeholder="Location" name="location" required>
    </div>
  </div>
  <div class="col-12 col-md-3">
    <div class="input-group input-group-lg">
      <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
      <input type="date" class="form-control" name="date" required>
    </div>
  </div>
  <div class="col-12 col-md-3">
    <div class="input-group input-group-lg guests-group">
      <span class="input-group-text"><i class="fa-solid fa-user-group"></i></span>
      <select class="form-select" name="guests" required>
        <option value="1">1 Guest</option>
        <option value="2">2 Guests</option>
        <option value="3">3 Guests</option>
        <option value="4">4 Guests</option>
        <option value="5">5+ Guests</option>
      </select>
    </div>
  </div>
  <div class="col-6 col-md-1 d-grid">
    <button type="submit" class="btn btn-success search-btn btn-lg"><i class="fa-solid fa-magnifying-glass"></i></button>
  </div>
  <div class="col-6 col-md-1 d-grid">
    <button type="reset" class="btn btn-outline-light clear-btn btn-lg"><i class="fa-solid fa-xmark"></i></button>
  </div>
</form>

<style>
.search-bar {
 background: linear-gradient(90deg, #247637ff 0%, #2b6f8cff 50%, #1b1c1cff 100%) !important;

  box-shadow: 0 4px 18px rgba(24,90,157,0.13);
  border-radius: 18px;
  padding: 28px 32px;
  margin-top: 38px;
  margin-bottom: 42px;
  position: relative;
  z-index: 3;
  backdrop-filter: blur(8px) saturate(140%);
  animation: fadeInUp 1s cubic-bezier(.23,1.01,.32,1) both;
  width: 100%;
  max-width: 1000px;
}
.search-bar .input-group,
.search-bar .input-group-lg {
  background: rgba(255,255,255,0.7);
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(24,90,157,0.08);
  overflow: hidden;
  transition: box-shadow 0.2s;
  font-size: 1.25rem;
}
.search-bar .input-group:focus-within {
  box-shadow: 0 0 0 3px #43cea2;
}
.search-bar .input-group-text {
  background: transparent;
  border: none;
  font-size: 1.5rem;
  color: #185a9d;
  padding: 0 18px;
}
.search-bar .form-control, .search-bar .form-select {
  background: transparent;
  border: none;
  font-size: 1.25rem;
  color: #185a9d;
  font-weight: 500;
  box-shadow: none;
  padding: 16px 14px;
  min-width: 120px;
}
.search-bar .form-control:focus, .search-bar .form-select:focus {
  background: #f7f9fa;
  border: none;
  box-shadow: 0 0 0 2px #43cea2;
  color: #185a9d;
}
.search-bar .search-btn,
.search-bar .clear-btn {
  font-size: 1.5rem;
  padding: 14px 0;
  border-radius: 10px;
}
.search-bar .search-btn {
  background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
  border: none;
  font-weight: 600;
  transition: background 0.2s, box-shadow 0.2s;
  box-shadow: 0 2px 8px rgba(24,90,157,0.10);
}
.search-bar .search-btn:hover {
  background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
  box-shadow: 0 4px 16px #43cea2;
}
.search-bar .clear-btn {
  border-radius: 10px;
  border: 2px solid #43cea2;
  color: #43cea2;
  background: transparent;
  transition: background 0.2s, color 0.2s;
}
.search-bar .clear-btn:hover {
  background: #43cea2;
  color: #fff;
}
@media (max-width: 900px) {
  .search-bar {
    padding: 14px 4vw;
    max-width: 98vw;
  }
}
@media (max-width: 700px) {
  .search-bar {
    flex-direction: column !important;
    padding: 10px 2vw;
    margin-top: 16px;
  }
  .search-bar .input-group,
  .search-bar .input-group-lg {
    margin-bottom: 10px;
    font-size: 1.1rem;
  }
}
</style>


<footer class="footer text-center mt-5 py-4" style="background: #f8f9fa; color: #6c757d;">
  <div class="container">
    <p class="mb-0">2023 Hotel Booking. All rights reserved.</p>
    <p class="mb-0">Follow us on:
      <a href="#" class="text-decoration-none text-success"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="text-decoration-none text-success"><i class="fab fa-twitter"></i></a>
      <a href="#" class="text-decoration-none text-success"><i class="fab fa-instagram"></i></a>
    </p>
  </div>








<!-- the search bar -->
 <div class="card">
    <h2><i class="fas fa-search"></i> Find a Hotel</h2>
    <form id="search-form" action="search.php" method="GET">
        <div class="form-group" style="flex-grow: 1;">
            <label for="search_query"><i class="fas fa-search-location"></i> Search by Hotel Name or Description</label>
            <input type="search" id="search_query" name="search_query" placeholder="Enter keywords to search...">
        </div>
        <button type="submit" class="btn btn-submit" id="search-btn"><i class="fas fa-search"></i> Search</button>
    </form>
</div>
<?php

// search.php

// --- DATABASE CONNECTION ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the search query from the URL
    $search_query = isset($_GET['search_query']) ? '%' . $_GET['search_query'] . '%' : '';

    // If a search query exists, perform the search
    if ($search_query) {
        $sql = "SELECT * FROM hotel_listings WHERE hotel_name LIKE :query OR description LIKE :query ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':query', $search_query);
        $stmt->execute();
        $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // If no search query, display all hotels (or a message)
        $sql = "SELECT * FROM hotel_listings ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

} catch (PDOException $e) {
    echo "<p style='text-align:center; width:100%; color:red;'>Database error: " . $e->getMessage() . "</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Search Results</title>
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
        .btn-delete {
            background-color: var(--accent-color);
        }
        .btn-update {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2><i class="fas fa-search-plus"></i> Search Results</h2>
        <div class="hotel-list">
            <?php
            if (count($hotels) > 0) {
                foreach ($hotels as $hotel) {
                    $ratingStars = str_repeat("★", $hotel['rating']) . str_repeat("☆", 5 - $hotel['rating']);
                    $imageSrc = !empty($hotel['image_path']) ? htmlspecialchars($hotel['image_path']) : 'https://via.placeholder.com/300x200?text=No+Image+Available';
                    
                    echo "
                    <div class='hotel-card'>
                        <img src='{$imageSrc}' alt='Image of {$hotel['hotel_name']}'>
                        <div class='hotel-info'>
                            <div class='hotel-name'>{$hotel['hotel_name']}</div>
                            <div class='hotel-rating'>{$ratingStars}</div>
                            <div class='hotel-description'>{$hotel['description']}</div>
                            <div class='hotel-price'>\${$hotel['price_per_night']}/night</div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p style='text-align:center; width:100%; color:#888;'>No hotel listings found for your search.</p>";
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>






  