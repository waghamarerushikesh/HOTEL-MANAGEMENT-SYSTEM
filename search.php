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
    <form id="search-form" action="../adminpanal/searchh.php" method="GET">
        <div class="form-group" style="flex-grow: 1;">
            <label for="search_query"><i class="fas fa-search-location"></i> Search by Hotel Name or Description</label>
            <input type="search" id="search_query" name="search_query" placeholder="Enter keywords to search...">
        </div>
        <button type="submit" class="btn btn-submit" id="search-btn"><i class="fas fa-search"></i> Search</button>
    </form>
</div>






  