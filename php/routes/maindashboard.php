<?php
 require 'auth_check.php';
 require 'audit_log.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Dashboard</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts + Icons -->
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/logo/5thFighterWing-logo.png">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../stylesheet/admin.css">
</head>
<body>
<div class="body">

  <!-- Sidebar -->
  <div class="left-panel">
      <div id="sidebar-container"></div>
  </div>

  <!-- Main content -->
  <div class="right-panel">
    <div class="main-content">

      <!-- Header -->
      <div class="main-header">
        <div class="header-left">
          <i class="fa-solid fa-home"></i>
          <h6 class="path"> / Dashboards /</h6>
          <h6 class="current-loc">Main Dashboard</h6>
        </div>
        <div class="header-right">
          <i class="fa-regular fa-bell me-3"></i>
          <i class="fa-regular fa-message me-3"></i>
          <div class="user-info">
            <i class="fa-solid fa-user-circle fa-lg me-2"></i>
            <div class="user-text">
              <span class="username"><?php echo $fullName; ?></span>
              <a id="logout-link" class="logout-link" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Confirm Modal -->
      <div id="confirmModal" class="modal">
        <div class="modal-content">
          <p id="confirmMessage"></p>
          <div class="modal-actions">
            <button id="confirmYes" class="btn btn-danger">Yes</button>
            <button id="confirmNo" class="btn btn-secondary">No</button>
          </div>
        </div>
      </div>

      <!-- Stats cards -->
      <div class="status-containers">
        <div class="stats-cards">
          <div class="card-value">08</div>
          <div class="card-label">Current Visitors</div>
        </div>
        <div class="stats-cards">
          <div class="card-value">12</div>
          <div class="card-label">Current Vehicles</div>
        </div>
        <div class="stats-cards">
          <div class="card-value">03</div>
          <div class="card-label">Pendings</div>
        </div>
        <div class="stats-cards">
          <div class="card-value">01</div>
          <div class="card-label">Reports</div>
        </div>
      </div>

      <!-- Chart + Widgets -->
      <div class="dashboard-grid">
        <div>
          <!-- Daily Visits -->
          <div id="daily-visits-widget" class="chart-card widget-card">
            <div class="widget-header">
              <h4>Daily Visits Analysis</h4>
              <div class="widget-actions">
                <button class="minimize-btn"><i class="fa-solid fa-minimize"></i></button>
                <button class="remove-btn"><i class="fa-solid fa-x"></i></button>
              </div>
            </div>
            <div class="widget-body">
              <canvas id="visitsChart" height="140"></canvas>
            </div>
          </div>

          <!-- Visitor Status -->
          <div id="visitor-status-widget" class="visitor-status widget-card">
            <div class="widget-header">
              <h4>Visitor Status</h4>
              <div class="widget-actions">
                <button class="minimize-btn"><i class="fa-solid fa-minimize"></i></button>
                <button class="remove-btn"><i class="fa-solid fa-x"></i></button>
              </div>
            </div>
            <div class="widget-body">
              <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John Doe</td>
                    <td><span style="color:green">08:00 AM</span></td>
                    <td><span style="color:red">05:00 PM</span></td>
                    <td>2025-09-01</td>
                    <td>
                      <button class="btn btn-success btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td>Jane Smith</td>
                    <td><span style="color:green">09:00 AM</span></td>
                    <td><span style="color:red">04:00 PM</span></td>
                    <td>2025-09-01</td>
                    <td>
                      <button class="btn btn-success btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div>
          <!-- Latest Vehicle -->
          <div id="latest-vehicle-widget" class="widget-box widget-card">
            <div class="widget-header">
              <h4>Latest Vehicle Entry</h4>
              <div class="widget-actions">
                <button class="minimize-btn"><i class="fa-solid fa-minimize"></i></button>
                <button class="remove-btn"><i class="fa-solid fa-x"></i></button>
              </div>
            </div>
            <div class="widget-body">
              <ul class="widget-list">
                <li>TOYOTA FORTUNER - John Doe</li>
                <li>HONDA CIVIC - Jane Smith</li>
                <li>NISSAN NV - Visitor A</li>
              </ul>
            </div>
            <div class="widget-footer"><a href="#">View full information</a></div>
          </div>

          <!-- User Activity -->
          <div id="user-activity-widget" class="widget-box widget-card">
            <div class="widget-header">
              <h4>User Activity</h4>
              <div class="widget-actions">
                <button class="minimize-btn"><i class="fa-solid fa-minimize"></i></button>
                <button class="remove-btn"><i class="fa-solid fa-x"></i></button>
              </div>
            </div>
            <div class="widget-body">
              <ul class="widget-list">
                <li><strong>John Doe</strong> - Logged in</li>
                <li><strong>Jane Smith</strong> - Added visitor</li>
                <li><strong>Admin</strong> - Updated landing page</li>
              </ul>
            </div>
            <div class="widget-footer"><a href="#">View all activity</a></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- JS -->
<script src="../../scripts/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../../scripts/admin.js"></script>
</body>
</html>
