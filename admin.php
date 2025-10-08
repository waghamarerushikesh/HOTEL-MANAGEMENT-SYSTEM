<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Hotel Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6fb;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #6f3620ff 0%, #125a43ff 100%);
            color: #fff;
            position: sticky;
            top: 0;
        }
        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .admin-header {
            background: #fff;
            border-bottom: 1px solid #e3e6f0;
            padding: 16px 24px;
            margin-bottom: 24px;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .dashboard-card {
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(24,90,157,0.08);
            background: #fff;
            padding: 24px;
            margin-bottom: 24px;
            transition: transform 0.3s ease;
        }
        .dashboard-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .dashboard-card h5 {
            color: #185a9d;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .search-bar {
            max-width: 300px;
        }
        @media (max-width: 767px) {
            .sidebar {
                min-height: auto;
                position: relative;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar py-4">
            <div class="text-center mb-4">
                <img src="https://img.icons8.com/color/96/000000/hotel-building.png" width="60" alt="Hotel Logo">
                <h4 class="mt-2">Admin Panel</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-chart-line"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-users"></i> Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-calendar-check"></i> Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../backend/adminpanal/storedataINSERT.PHP"><i class="fas fa-bed"></i> Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-credit-card"></i> Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-cog"></i> Settings</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link text-danger" href="user-login.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>
        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-md-4">
            <div class="admin-header d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="mb-0">Dashboard</h3>
                    <small class="text-muted">Welcome, Admin!</small>
                </div>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control search-bar me-3" placeholder="Search bookings...">
                    <img src="https://img.icons8.com/color/48/000000/user-male-circle--v2.png" class="profile-img" alt="Admin">
                    <span>Admin</span>
                </div>
            </div>
            <!-- Dashboard Cards -->
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard-card text-center">
                        <h5><i class="fas fa-users"></i> Total Users</h5>
                        <h2>120</h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card text-center">
                        <h5><i class="fas fa-calendar-check"></i> Total Bookings</h5>
                        <h2>45</h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card text-center">
                        <h5><i class="fas fa-bed"></i> Available Rooms</h5>
                        <h2>18</h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card text-center">
                        <h5><i class="fas fa-credit-card"></i> Payments</h5>
                        <h2>₹ 1,20,000</h2>
                    </div>
                </div>
            </div>
            <!-- Recent Bookings Table -->
            <div class="dashboard-card">
                <h5><i class="fas fa-clock"></i> Recent Bookings</h5>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Guest Name</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Deluxe</td>
                                <td>2025-07-28</td>
                                <td>2025-07-30</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>Suite</td>
                                <td>2025-07-29</td>
                                <td>2025-08-01</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Michael Lee</td>
                                <td>Standard</td>
                                <td>2025-07-27</td>
                                <td>2025-07-29</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
