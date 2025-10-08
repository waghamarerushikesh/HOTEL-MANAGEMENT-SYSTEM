<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EaseMyTrip Features</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .features-section {
            padding: 60px 20px;
            text-align: center;
            
        }

        .features-section h1 {
            font-size: 2.5rem;
            color: #1e2a3a;
            margin-bottom: 50px;
        }

        .feature-container {
            display: flex;
            justify-content: center;
            align-items: stretch;
            flex-wrap: wrap;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            flex: 1;
            min-width: 200px;
             background: linear-gradient(90deg, #0f2027 0%, #2c5364 50%, #43cea2 100%) !important;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .feature-card .icon {
            font-size: 2.5rem;
            color: #817e85ff;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #d4dbe4ff;
            margin-bottom: 10px;
        }

        .feature-card p {
            font-size: 1rem;
            color: #dce1e6ff;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .feature-container {
                flex-direction: column;
            }
            .features-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <section class="features-section">
        <h1>Why Book Hotels with hotelrushi.com ?</h1>
        <div class="feature-container">
            <div class="feature-card">
                <div class="icon"><i class="fas fa-hotel"></i></div>
                <h3>Extensive Hotel Options</h3>
                <p>Best hotels available for different destinations to offer you the stay of a lifetime.</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-tags"></i></div>
                <h3>Savings on Hotel Booking</h3>
                <p>Enjoy hotel bookings with the best offers and discounts and make your stay unforgettable.</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-star-half-alt"></i></div>
                <h3>Hotel Ratings</h3>
                <p>All our hotels have good ratings on Trip Advisor and are recommended by users.</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                <h3>Best Price</h3>
                <p>Get excellent hotels/resorts at the best prices to pamper your desires.</p>
            </div>
        </div>
    </section>

</body>
</html>