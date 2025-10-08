<?PHP include 'navbar.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Rushi Hotel</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        /* General Body Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(90deg, #e3f2fd 0%, #bbdefb 100%);
            margin: 0;
            padding: 0;+
            color: #333;
            line-height: 1.6;
        }

        /* Header Styling (consistent with previous pages) */
        header {
            background: linear-gradient(90deg, #0f2027 0%, #2c5364 50%, #43cea2 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Main Contact Page Layout */
        .contact-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap; /* Allows sections to wrap on smaller screens */
            gap: 30px;
            justify-content: center;
            align-items: flex-start;
        }

        /* Contact Information Section */
        .contact-info {
            flex: 1; /* Allows it to grow */
            min-width: 300px; /* Minimum width before wrapping */
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .contact-info h2 {
            color: #0f2027;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
        }

        .contact-info h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #43cea2;
            border-radius: 5px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.1rem;
            color: #555;
        }

        .contact-item i {
            font-size: 1.5rem;
            color: #2c5364;
            width: 30px; /* Fixed width for icons */
            text-align: center;
        }
/* this is a main things for  in the style  */
        .contact-item a {
            color: #2c5364;
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-item a:hover {
            color: #43cea2;
        }

        /* Social Media Links */
        .social-media {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
        }

        .social-media a {
            display: inline-block;
            margin: 0 10px;
            font-size: 1.8rem;
            color: #2c5364;
            transition: color 0.3s, transform 0.3s;
        }

        .social-media a:hover {
            color: #43cea2;
            transform: scale(1.2);
        }

        /* Contact Form Section */
        .contact-form {
            flex: 2; /* Allows it to take more space */
            min-width: 350px; /* Minimum width before wrapping */
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            color: #0f2027;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
        }

        .contact-form h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #43cea2;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        .form-group input,
        .form-group textarea {
            width: calc(100% - 20px); /* Adjust for padding */
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box; /* Include padding and border in width */
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #43cea2;
            box-shadow: 0 0 8px rgba(67, 206, 162, 0.3);
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, #2c5364 0%, #43cea2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease-in-out, transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #43cea2 0%, #2c5364 100%);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Map Section */
        .map-section {
            width: 100%; /* Takes full width below other sections */
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .map-section h2 {
            color: #0f2027;
            margin-top: 0;
            margin-bottom: 25px;
            position: relative;
        }

        .map-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #43cea2;
            border-radius: 5px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .contact-page {
                flex-direction: column; /* Stack sections vertically on small screens */
                padding: 15px;
            }

            .contact-info, .contact-form {
                min-width: unset; /* Remove min-width constraint */
                width: 100%; /* Take full width */
                padding: 20px;
            }

            .contact-info h2, .contact-form h2, .map-section h2 {
                font-size: 1.8rem;
            }

          

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.8rem;
            }

            .contact-info h2, .contact-form h2, .map-section h2 {
                font-size: 1.5rem;
            }

            .contact-item {
                font-size: 1rem;
            }

            .contact-item i {
                font-size: 1.3rem;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .form-group input,
            .form-group textarea {
                padding: 10px;
                font-size: 0.9rem;
            }

            .submit-btn {
                padding: 12px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    

    <div class="contact-page">
        <!-- Contact Information Section -->
        <section class="contact-info">
            <h2>Get in Touch</h2>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>123 Main Street, City, State, 12345</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>Phone: <a href="tel:+1234567890">+1 (234) 567-890</a></span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>Email: <a href="mailto:info@rushi-hotel.com">info@rushi-hotel.com</a></span>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <span>Reception Hours: 24/7</span>
            </div>

            <div class="social-media">
                <h3>Follow Us</h3>
                <a href="https://facebook.com/rushi-hotel" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/rushi-hotel" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com/rushi-hotel" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com/company/rushi-hotel" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject of your message" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Type your message here..." required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </section>
    </div>

    <!-- Map Section -->
 
    
        <div class="map-placeholder">
          <button type="button"><a href="https://www.google.com/maps/place/Kapad+Bazar+Ahmednagar/@19.095377,74.7395223,21z/data=!4m6!3m5!1s0x3bdcb1eadd43a95d:0xcdec21e99095f525!8m2!3d19.0953292!4d74.7396732!16s%2Fg%2F11qb3q07m2?entry=ttu&g_ep=EgoyMDI1MDczMC4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer">My Location</a></button>
        </div>
 <style>
    
    
    /* Container for the button */
.map-placeholder {
    text-align: center;
    padding: 20px;
    margin-top: 20px;
}

/* Styling the button element */
.map-placeholder button {
    background-color: #28a745; /* A vibrant green color */
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 50px; /* Makes the button capsule-shaped */
    font-size: 1.1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease; /* Smooth transition for hover effects */
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
}

/* Styling the link inside the button */
.map-placeholder button a {
    color: white;
    text-decoration: none; /* Removes the underline from the link */
    display: block; /* Makes the entire button area clickable */
}

/* Hover effect for the button */
.map-placeholder button:hover {
    background-color: #218838; /* Darker green on hover */
    transform: translateY(-3px); /* Lifts the button slightly */
    box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4);
}

/* Active state for the button when clicked */
.map-placeholder button:active {
    background-color: #1e7e34; /* Even darker green when pressed */
    transform: translateY(0); /* Returns the button to its original position */
    box-shadow: 0 2px 5px rgba(40, 167, 69, 0.3);
}
 </style>

</body>
</html>


<?PHP include 'footer.php'; ?>