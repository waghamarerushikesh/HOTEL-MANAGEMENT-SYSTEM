
<!-- this is a style for my css  -->

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-brand">
            <a href="/" class="footer-logo">
                <img src="your-logo.svg" alt="Your Company Logo">
            </a>
            <p class="footer-tagline">Creating stunning digital experiences.</p>
        </div>

        <div class="footer-links">
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Contact</h4>
                <address>
                    123 Main Street<br>
                    City, State, 12345<br>
                    <a href="mailto:info@yourcompany.com">info@yourcompany.com</a>
                </address>
            </div>
        </div>

        <div class="footer-newsletter">
            <h4>Stay Updated</h4>
            <p>Subscribe to our newsletter for the latest news and offers.</p>
            <form action="#" method="post" class="newsletter-form">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>

    <div class="footer-bottom-bar">
    
        <div class="social-links">
            <a href="#" aria-label="Facebook"><img src="facebook-icon.svg" alt="Facebook"></a>
            <a href="#" aria-label="Twitter"><img src="twitter-icon.svg" alt="Twitter"></a>
            <a href="#" aria-label="Instagram"><img src="instagram-icon.svg" alt="Instagram"></a>
            <a href="#" aria-label="LinkedIn"><img src="linkedin-icon.svg" alt="LinkedIn"></a>
        </div>
    </div>
</footer>
<style>
    /* General Footer Styles */
.site-footer {
    margin-top: 20px;
 background: linear-gradient(90deg, #0f2027 0%, #2c5364 50%, #43cea2 100%) !important;
    color: #f0f0f0;
    font-family: 'Arial', sans-serif;
    padding: 50px 20px 20px;
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    gap: 40px;
}

/* Brand & Tagline */
.footer-brand {
    flex: 1;
    min-width: 250px;
}

.footer-logo img {
    width: 150px;
    margin-bottom: 15px;
}

.footer-tagline {
    font-size: 1rem;
    color: #bbb;
    line-height: 1.5;
}

/* Navigation Links */
.footer-links {
    display: flex;
    flex: 2;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 30px;
}

.footer-column {
    min-width: 150px;
}

.footer-column h4 {
    font-size: 1.2rem;
    margin-bottom: 20px;
    color: #fff;
    border-bottom: 2px solid #555;
    padding-bottom: 5px;
}

.footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-column a {
    color: #bbb;
    text-decoration: none;
    line-height: 2.2;
    transition: color 0.3s ease;
}

.footer-column a:hover {
    color: #ffffff;
    text-decoration: underline;
}

/* Contact Info */
.footer-column address {
    font-style: normal;
    font-size: 1rem;
    line-height: 1.6;
    color: #bbb;
}

.footer-column address a {
    color: #bbb;
    text-decoration: none;
}

/* Newsletter Section */
.footer-newsletter {
    flex: 1;
    min-width: 250px;
}

.footer-newsletter h4 {
    font-size: 1.2rem;
    margin-bottom: 15px;
    color: #fff;
}

.footer-newsletter p {
    font-size: 1rem;
    color: #bbb;
    margin-bottom: 15px;
}

.newsletter-form {
    display: flex;
}

.newsletter-form input {
    flex: 1;
    padding: 10px;
    border: 1px solid #555;
    background-color: #333;
    color: #fff;
    border-radius: 5px 0 0 5px;
}

.newsletter-form button {
    padding: 10px 15px;
    border: none;
    background-color: #007bff; /* A nice highlight color */
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    border-radius: 0 5px 5px 0;
    transition: background-color 0.3s ease;
}

.newsletter-form button:hover {
    background-color: #0056b3;
}

/* Bottom Bar */
.footer-bottom-bar {
    border-top: 1px solid #333;
    margin-top: 40px;
    padding-top: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.copyright {
    font-size: 0.9rem;
    color: #888;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-links a img {
    width: 24px;
    height: 24px;
    transition: transform 0.3s ease;
}

.social-links a:hover img {
    transform: scale(1.1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        text-align: center;
        gap: 30px;
    }

    .footer-links {
        justify-content: center;
        text-align: center;
    }

    .footer-column {
        min-width: unset;
        width: 100%;
        margin-bottom: 20px;
    }

    .footer-column h4 {
        border-bottom: none;
    }

    .footer-newsletter {
        width: 100%;
        text-align: center;
    }

    .newsletter-form {
        justify-content: center;
    }

    .footer-bottom-bar {
        flex-direction: column;
        text-align: center;
    }

    .copyright {
        margin-bottom: 10px;
    }
}
</style>