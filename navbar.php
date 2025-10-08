<!-- Font Awesome CDN for icons -->
 <!-- this is a navbar code -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<nav class="navbar navbar-expand-lg navbar-dark shadow" style="background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);">
  <div class="container-fluid">
    <!-- this is using for the navbar in the file included for the new thing for the including new things  -->
    <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
      <i class="fa-solid fa-hotel me-2"></i>Rushi hotel
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hotelNavbar" aria-controls="hotelNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="hotelNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../frontend/thehomepage.PHP">
            <i class="fa-solid fa-house"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/adminpanal/thedatalisting.php">
            <i class="fa-solid fa-bed"></i> Rooms
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/adminpanal/gall.php">
            <i class="fa-solid fa-images"></i> Gallery
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/about.php">
            <i class="fa-solid fa-info-circle"></i> About Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/contact.php">
            <i class="fa-solid fa-envelope"></i> Contact
          </a>
        </li>
        <li class="nav-item d-lg-none">
          <hr class="dropdown-divider">
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../backend/user-login.php">
            <i class="fa-solid fa-right-to-bracket"></i> Login
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../backend/user-registration.php">
            <i class="fa-solid fa-user-plus"></i> Register
          </a>
        </li>
        <li class="nav-item ms-lg-3">
          <a class="btn btn-light text-primary fw-bold px-3 py-1" href="booking.html">
            <i class="fa-solid fa-calendar-check"></i> Book Now
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Bootstrap 5 JS and CSS CDN (add in your main HTML if not already present) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
  .navbar {
    min-height: 50px;
    background: linear-gradient(90deg, #0f2027 0%, #2c5364 50%, #43cea2 100%) !important;
    box-shadow: 0 4px 18px rgba(24,90,157,0.18);
  }
  .navbar-brand {
    font-size: 2rem;
    height: 50px;
    display: flex;
    align-items: center;
    letter-spacing: 2px;
    color: #fff !important;
    text-shadow: 1px 2px 8px rgba(24,90,157,0.18);
  }
  .navbar-nav .nav-link, .btn-light {
    color: #fff !important;
    font-weight: 500;
    transition: color 0.2s, background 0.2s;
  }
  .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
    color: #43cea2 !important;
    background: rgba(255,255,255,0.08);
    border-radius: 6px;
  }
  .btn-light {
    background: #fff !important;
    color: #185a9d !important;
    border: none;
    font-weight: 600;
  }
  .btn-light:hover {
    background: #4f2267 !important;
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .navbar-brand {
      font-size: 1.3rem;
    }
  }
</style>