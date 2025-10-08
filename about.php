<?php
// about.php
include 'navbar.php'; // Include the navbar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Rushi Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    </style>
</head>
<body>


    <section class="about-us-content">
        <div class="container">
            <div class="content-text">
                <h2>Our Story</h2>
                <p>Welcome to <strong>Rushi Hotel</strong>, where luxury meets tranquility. Our journey began with a simple vision: to create a sanctuary of comfort and elegance for our guests. We believe a hotel should be more than just a place to stay—it should be a destination in itself, offering a memorable experience that rejuvenates the body and soul.</p>
                <p>At Rushi Hotel, we are dedicated to providing world-class hospitality, ensuring every moment of your stay is filled with comfort and delight. From our thoughtfully designed **luxury rooms** that offer a spacious retreat to the breathtaking views from our **rooftop infinity pool**, every detail has been crafted with your relaxation in mind.</p>
                <p>We take immense pride in our commitment to excellence, which is reflected in every service we offer. Indulge your senses with the exquisite flavors of our **fine dining restaurant**, where our top chefs create gourmet meals to satisfy every palate. Unwind and refresh your mind and body at our **luxury spa**, or stay active at our **state-of-the-art gym**.</p>
            </div>
            <div class="content-image">
                <img src="../uploadImg/IMG-20250728-WA0013.jpg" alt="Rushi Hotel Lobby">
            </div>
        </div>

        <div class="container">
            <div class="content-image">
                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d" alt="Rushi Hotel Room">
            </div>
            <div class="content-text">
                <h2>Our Amenities</h2>
                <p>Whether you're visiting for a romantic getaway, a family vacation, or a business trip, Rushi Hotel is your perfect choice. Our elegant **grand lobby** provides a warm welcome, while our **conference hall** is equipped to host your business needs. You can also explore our lush **green gardens**, where you can find a peaceful escape, or enjoy a signature cocktail at our stylish **bar**. We even have a dedicated **kids' play area** to ensure our youngest guests have a fun and safe experience.</p>
            </div>
        </div>
    </section>


</body>
</html>
<style>
    body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: #333;
    background-color: #f4f4f4;
}

/* Header/Navbar */


/* About Us Hero Section */
.about-us-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1563911302283-d2bc129e7570') no-repeat center center/cover;
    height: 60vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    text-align: center;
}

.hero-content h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.hero-content p {
    font-size: 1.25rem;
    font-weight: 300;
}

/* About Us Content Section */
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

<?php 
// Include the footer if needed
include 'footer.php';
?>