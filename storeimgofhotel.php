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
    header("Location: index.php"); // Assuming your listings page is now index.php
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

<!-- this is a main things of the storeimgofhotel  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($hotel['hotel_name']); ?> Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f4f4; margin: 0; padding: 0; color: #333; }
        .page-container { max-width: 1000px; margin: 30px auto; padding: 20px; background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .hotel-header { text-align: center; margin-bottom: 20px; }
        .hotel-header h1 { color: #0f2027; margin: 0; font-size: 2.5rem; }
        .hotel-header .rating { color: gold; font-size: 1.5rem; }
        .carousel-container { position: relative; width: 100%; margin-bottom: 20px; }
        .carousel-item img { width: 100%; height: 500px; object-fit: cover; border-radius: 8px; }
        .slick-prev:before, .slick-next:before { color: #000 !important; font-size: 30px !important; }
        .hotel-info-section { display: flex; gap: 30px; margin-bottom: 20px; }
        .info-details { flex: 2; }
        .info-summary { flex: 1; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .info-summary h3 { margin-top: 0; color: #0f2027; }
        .info-summary .price { font-size: 1.8rem; font-weight: bold; color: #2c5364; margin-bottom: 10px; }
        .info-summary .price small { font-size: 1rem; font-weight: normal; }
        .book-btn { width: 100%; padding: 15px; background-color: #43cea2; color: white; border: none; border-radius: 5px; font-size: 1.2rem; font-weight: bold; cursor: pointer; transition: background-color 0.3s; margin-top: 15px; }
        .book-btn:hover { background-color: #3aa382; }
        .payment-options { margin-top: 20px; text-align: center; }
        .payment-options img { height: 30px; margin: 0 5px; }
        .description-text { line-height: 1.6; }
    </style>
</head>
<body>
    <?php include 'C:\xamppp\htdocs\hotel\frontend\navbar.php'; ?>

    <div class="page-container">
        <?php if ($hotel): ?>
        <div class="hotel-header">
            <h1><?php echo htmlspecialchars($hotel['hotel_name']); ?></h1>
            <p class="rating"><?php echo generateStars($hotel['rating']); ?></p>
        </div>

        <div class="carousel-container">
            <div class="carousel">
                <?php if ($carousel_images): ?>
                    <?php foreach ($carousel_images as $img): ?>
                        <div class="carousel-item">
                            <img src="<?php echo htmlspecialchars($img); ?>" alt="Hotel Image">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No images found for this hotel.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="hotel-info-section">
            <div class="info-details">
                <h2>About the Hotel</h2>
                <p class="description-text"><?php echo htmlspecialchars($hotel['description']); ?></p>
                <p class="description-text">Additional details about amenities, services, and policies would go here. This could be fetched from a more detailed database table.</p>
            </div>
            
            <div class="info-summary">
                <h3>Booking Details</h3>
                <p class="price">$<?php echo htmlspecialchars(number_format($hotel['price_per_night'], 2)); ?> <small>per night</small></p>
                
                <button class="book-btn">Book Now</button>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.carousel').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear'
            });
        });
    </script>
</body>
</html>
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

// Fetch all hotels to populate the dropdown menu
$sql = "SELECT id, hotel_name FROM hotel_listings";
$stmt = $conn->prepare($sql);
$stmt->execute();
$hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if the form was submitted
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel_id = $_POST['hotel_id'];
    $target_dir = "uploadImg/";

    // Create the directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    
    $image_path = $target_dir . basename($_FILES["image_file"]["name"]);
    $image_file_type = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

    // Check if image file is a real image
    $check = getimagesize($_FILES["image_file"]["tmp_name"]);
    if ($check === false) {
        $message = "File is not an image.";
    } elseif ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    } elseif (move_uploaded_file($_FILES["image_file"]["tmp_name"], $image_path)) {
        // File uploaded successfully, now insert into the database
        $sql_insert = "INSERT INTO hotel_images (hotel_id, image_path) VALUES (:hotel_id, :image_path)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bindParam(':hotel_id', $hotel_id);
        $stmt_insert->bindParam(':image_path', $image_path);

        if ($stmt_insert->execute()) {
            $message = "The image " . htmlspecialchars(basename($_FILES["image_file"]["name"])) . " has been uploaded and stored.";
        } else {
            $message = "Sorry, there was an error storing the image in the database.";
        }
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Hotel Image</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .form-container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, input[type="file"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .submit-btn { width: 100%; padding: 10px; background-color: #43cea2; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; }
        .submit-btn:hover { background-color: #3aa382; }
        .message { margin-top: 20px; padding: 10px; border-radius: 4px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Upload Hotel Image</h1>
    <?php if ($message): ?>
        <div class="message <?php echo strpos($message, 'error') !== false ? 'error' : 'success'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="hotel_id">Select Hotel:</label>
            <select name="hotel_id" id="hotel_id" required>
                <option value="">-- Choose a Hotel --</option>
                <?php foreach ($hotels as $hotel): ?>
                    <option value="<?php echo htmlspecialchars($hotel['id']); ?>">
                        <?php echo htmlspecialchars($hotel['hotel_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image_file">Select Image:</label>
            <input type="file" name="image_file" id="image_file" required>
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn">Upload Image</button>
        </div>
    </form>
</div>

</body>
</html>