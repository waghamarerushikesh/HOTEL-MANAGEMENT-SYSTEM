<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Connect to the database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Get the hotel ID from the URL
$hotel_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($hotel_id > 0) {
    // Fetch hotel data based on the ID
    $sql = "SELECT * FROM hotel_listings WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $hotel_id, PDO::PARAM_INT);
    $stmt->execute();
    $hotel = $stmt->fetch(PDO::FETCH_ASSOC);

    // If a hotel is found, fetch its images
    if ($hotel) {
        $sql_images = "SELECT image_path FROM hotel_images WHERE hotel_id = :id";
        $stmt_images = $conn->prepare($sql_images);
        $stmt_images->bindParam(':id', $hotel_id, PDO::PARAM_INT);
        $stmt_images->execute();
        $carousel_images = $stmt_images->fetchAll(PDO::FETCH_COLUMN);
    } else {
        $carousel_images = []; // No hotel found, no images
    }

} else {
    // Redirect to the listings page if no ID is provided
    header("Location: index.php");
    exit();
}

// Function to generate star ratings
function generateStars($rating) {
    $stars = '';
    $full_stars = floor($rating);
    for ($i = 0; $i < $full_stars; $i++) { $stars .= '★'; }
    if (($rating - $full_stars) >= 0.5) { $stars .= '☆'; } // Half star
    $empty_stars = 5 - $full_stars - (($rating - $full_stars) >= 0.5 ? 1 : 0);
    for ($i = 0; $i < $empty_stars; $i++) { $stars .= '☆'; }
    return $stars;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($hotel['hotel_name']); ?> Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c5364;
            --secondary-color: #43cea2;
            --text-color: #333;
            --background-color: #f8f9fa;
            --card-background: #ffffff;
            --shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: var(--background-color);
            margin: 0;
            padding: 0;
            color: var(--text-color);
            line-height: 1.6;
            opacity: 0;
            animation: fadeIn 0.8s forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .hotel-header {
            position: relative;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-bottom: 40px;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transform: translateY(20px);
            opacity: 0;
            animation: slideInUp 0.6s 0.3s forwards;
        }
        .hotel-header img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
            z-index: 1;
            transition: transform 0.5s ease-in-out;
        }
        .hotel-header:hover img {
            transform: scale(1.05);
        }
        .header-content {
            position: relative;
            z-index: 2;
        }
        .hotel-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            animation: textPopIn 0.8s 0.6s forwards;
        }
        @keyframes textPopIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .hotel-header .rating {
            color: gold;
            font-size: 2rem;
            margin-top: 10px;
            animation: textPopIn 0.8s 0.8s forwards;
        }
        .hotel-info-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
        }
        .info-details, .info-summary {
            padding: 30px;
            background: var(--card-background);
            border-radius: 12px;
            box-shadow: var(--shadow);
            transform: translateY(20px);
            opacity: 0;
            animation: slideInUp 0.6s 0.5s forwards;
        }
        .info-details {
            animation-delay: 0.7s;
        }
        .info-details h2 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-color);
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .description-text {
            font-size: 1.1rem;
            color: #555;
        }
        .info-summary {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .info-summary h3 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-color);
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
            width: 100%;
        }
        .info-summary .price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 15px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .info-summary .price small {
            font-size: 1.2rem;
            font-weight: 400;
            color: #888;
        }
        .book-btn {
            width: 100%;
            padding: 18px;
            background-color: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.4rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .book-btn:hover {
            background-color: #3aa382;
            transform: translateY(-2px) scale(1.02);
            box-shadow: var(--shadow);
        }
        .payment-options {
            margin-top: 25px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 0.8s 1s forwards;
        }
        .payment-options p {
            font-weight: 500;
            margin-bottom: 10px;
        }
        .payment-options img {
            height: 35px;
            margin: 0 8px;
            opacity: 0.8;
            transition: opacity 0.3s ease, transform 0.2s ease;
        }
        .payment-options img:hover {
            opacity: 1;
            transform: translateY(-3px);
        }
        @keyframes slideInUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        /* Mobile-friendly design */
        @media (max-width: 768px) {
            .hotel-info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .hotel-header {
                height: 40vh;
            }
            .hotel-header h1 {
                font-size: 2.5rem;
            }
            .info-details, .info-summary {
                padding: 20px;
            }
            .info-details h2, .info-summary h3 {
                font-size: 1.8rem;
            }
            .info-summary .price {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'C:\xamppp\htdocs\hotel\frontend\navbar.php'; ?>

    <div class="page-container">
        <?php if ($hotel): ?>
        <div class="hotel-header">
            <?php if (!empty($carousel_images)): ?>
                <img src="<?php echo htmlspecialchars($carousel_images[0]); ?>" alt="Hotel Hero Image">
            <?php endif; ?>
            <div class="header-content">
                <h1><?php echo htmlspecialchars($hotel['hotel_name']); ?></h1>
                <p class="rating"><?php echo generateStars($hotel['rating']); ?></p>
            </div>
        </div>

        <div class="hotel-info-grid">
            <div class="info-details">
                <h2>About the Hotel</h2>
                <p class="description-text"><?php echo htmlspecialchars($hotel['description']); ?></p>
            </div>
            
         <div class="info-summary">
    <h3>Booking Details</h3>
    <p class="price">$<?php echo htmlspecialchars(number_format($hotel['price_per_night'], 2)); ?> <small>per night</small></p>
    
    <form action="create-checkout-session.php" method="POST">
        <input type="hidden" name="hotel_id" value="<?php echo htmlspecialchars($hotel['id']); ?>">
        <input type="hidden" name="hotel_name" value="<?php echo htmlspecialchars($hotel['hotel_name']); ?>">
        <input type="hidden" name="price_per_night" value="<?php echo htmlspecialchars($hotel['price_per_night']); ?>">
        
        <button type="submit" class="book-btn">Book Now</button>
    </form>

    <div class="payment-options">
        <p>Accepted Payments:</p>
        <img src="https://www.svgrepo.com/show/303102/visa-logo.svg" alt="Visa">
        <img src="https://www.svgrepo.com/show/303104/mastercard-logo.svg" alt="Mastercard">
        <img src="https://www.svgrepo.com/show/303114/paypal-logo.svg" alt="PayPal">
    </div>
</div>
        </div>

        <?php else: ?>
        <p>Hotel not found.</p>
        <?php endif; ?>
    </div>

    <?php include 'C:\xamppp\htdocs\hotel\frontend\footer.php'; ?>
</body>
</html>
<!-- this is a main things are found in the market  -->
