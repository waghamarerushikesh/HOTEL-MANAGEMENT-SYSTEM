<?php
include 'C:\xamppp\htdocs\hotel\frontend\navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .hero-section {
            position: relative;
            width: 100%;
            height: 500px;
           
        }
        .hero-section img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
        }
        .hero-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(24, 90, 157, 0.35);
            display: flex;
            flex-direction: column;
            align-items: flex-start;   /* changed */
            justify-content: center;
            color: #fff;
            text-align: left;          /* changed */
            padding-left: 7vw;         /* add some left padding for spacing */
        }
        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 18px;
            font-weight: 700;
            letter-spacing: 2px;
        }
        .hero-content p {
            font-size: 22px;
            margin-bottom: 32px;
            font-weight: 400;
        }
        .book-btn {
            padding: 14px 38px;
            font-size: 20px;
            background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(24,90,157,0.10);
        }
        .book-btn:hover {
            background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
        }
        @media (max-width: 600px) {
            .hero-content h1 {
                font-size: 28px;
            }
            .hero-content p {
                font-size: 16px;
            }
            .hero-section, .hero-section img {
                height: 250px;
            }
            .hero-content {
                padding-left: 4vw;
            }
        }
        .glow-btn {
            box-shadow: 0 0 18px 2px #43cea2, 0 2px 8px rgba(24,90,157,0.10);
            animation: glow 1.5s infinite alternate;
        }
        @keyframes glow {
            from { box-shadow: 0 0 18px 2px #43cea2, 0 2px 8px rgba(24,90,157,0.10);}
            to { box-shadow: 0 0 32px 8px #43cea2, 0 2px 8px rgba(24,90,157,0.10);}
        }
        .scroll-down {
            position: absolute;
            left: 50%;
            bottom: 24px;
            transform: translateX(-50%);
            color: #fff;
            font-size: 2.2rem;
            opacity: 0.8;
            animation: bounce 1.5s infinite;
            z-index: 2;
        }
        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0);}
            50% { transform: translateX(-50%) translateY(18px);}
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="hero-section">
        <img src="../uploadImg/IMG-20250728-WA0011.jpg" alt="Hotel Main">
        <div class="hero-content">
            <h1>
                <span style=padding:8px 18px;border-radius:8px;box-shadow:0 2px 8px rgba(24,90,157,0.15);">
                    Welcome to <span>Paradise Hotel</span>
                </span>
            </h1>
            <p style="background:rgba(255,255,255,0.10);padding:10px 18px;border-radius:8px;box-shadow:0 2px 8px rgba(24,90,157,0.10);">
                Discover <b>luxury</b>, <b>comfort</b>, and unforgettable experiences.<br>
                Book your perfect stay with us and enjoy world-class hospitality.
            </p>
            <a href="booking.html">
                <button class="book-btn glow-btn">
                    <i class="fa-solid fa-calendar-check"></i> Book Now
                </button>
            </a>
        </div>
        <!-- Animated scroll-down indicator -->
        <div class="scroll-down">
            <i class="fa-solid fa-chevron-down"></i>
        </div>
    </div>
</body>
</html>
<!-- this is another  content -->
<!-- Bootstrap 5 CSS (if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- Flatpickr CSS for date picker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">



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
<style>
/* Base container and card styling */
.container {
    padding: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
    background: linear-gradient(90deg, #2b6f8cff 0%, #247637ff 50%, #1b1c1cff 100%);
    box-shadow: 0 8px 24px rgba(24, 90, 157, 0.2);
    border-radius: 18px;
    padding: 32px;
    width: 100%;
    max-width: 900px;
    position: relative;
    z-index: 3;
    animation: fadeInUp 1s cubic-bezier(.23, 1.01, .32, 1) both;
}

/* Card content and header styling */
.card h2 {
    color: #fff;
    font-size: 1.75rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    text-align: center;
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
}

.card h2 .fas {
    margin-right: 0.5rem;
}

/* Search form and input styling */
.search-form {
    width: 100%;
}

.search-container {
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(24, 90, 157, 0.08);
    transition: box-shadow 0.2s;
}

.search-container:focus-within {
    box-shadow: 0 0 0 3px #43cea2;
}

#search_query {
    flex-grow: 1;
    border: none;
    background: transparent;
    padding: 18px 20px;
    font-size: 1.15rem;
    color: #185a9d;
    font-weight: 500;
}

#search_query:focus {
    outline: none;
}

#search_query::placeholder {
    color: rgba(24, 90, 157, 0.6);
}

/* Search button styling */
.search-btn {
    border: none;
    background: #08223bff;
    color: #fff;
    font-size: 1.5rem;
    padding: 0 20px;
    height: 100%;
    cursor: pointer;
    transition: background-color 0.2s, transform 0.2s;
}

.search-btn:hover {
    background: #43cea2;
    transform: scale(1.05);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .card {
        padding: 20px;
    }

    .card h2 {
        font-size: 1.5rem;
    }

    #search_query {
        font-size: 1rem;
    }

    .search-btn {
        padding: 0 15px;
    }
}
</style>


<div class="container">
  <div class="card">
    <h2><i class="fas fa-search"></i> Find Your Perfect Hotel</h2>
    <form id="search-form" class="search-form" method="GET" action="../frontend/adminpanal/search_page.php">
      <div class="search-container">
        <input type="search" id="search_query" name="search_query"
               placeholder="E.g., 'Luxury Suite' or 'Coastal Getaway'"
               value="<?php echo isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : ''; ?>">
        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
      </div>
    </form>
  </div>
</div>




<?PHP
include "../frontend/theimgforhomepage.PHP";
include "../frontend/imgIMP.php";
include "../frontend/footer.php";
?>
