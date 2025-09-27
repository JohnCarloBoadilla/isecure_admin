<?php
require 'auth_check.php';
require 'audit_log.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

// --- Session User Info ---
$fullName = 'Unknown User';
$role = 'Unknown Role';

if (!isset($_SESSION['token'])) {
    header("Location: loginpage.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM personnel_sessions WHERE token = :token AND expires_at > NOW()");
$stmt->execute([':token' => $_SESSION['token']]);
$session = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$session) {
    session_unset();
    session_destroy();
    header("Location: loginpage.php");
    exit;
}

// Fetch user info
if (!empty($session['user_id'])) {
    $stmt = $pdo->prepare("SELECT full_name, role FROM users WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $session['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $fullName = htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8');
    }
}

// --- Visitor Status ---
$stmt = $pdo->prepare("SELECT id, full_name, time_in, time_out, date, status FROM visitors ORDER BY date DESC, time_in DESC LIMIT 10");
$stmt->execute();
$visitorStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);

// --- Latest Vehicle Entries ---
$stmt = $pdo->prepare("SELECT plate_number, vehicle_brand, vehicle_model, owner_name, created_at FROM vehicles ORDER BY created_at DESC LIMIT 5");
$stmt->execute();
$latestVehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// --- User Activity (audit logs) ---
$stmt = $pdo->prepare("SELECT user_id, action, ip_address, created_at FROM admin_audit_logs ORDER BY created_at DESC LIMIT 10");
$stmt->execute();
$userActivity = $stmt->fetchAll(PDO::FETCH_ASSOC);

// --- Daily Visitor Analysis (last 7 days) ---
$weekDays = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
$visitData = array_fill(0, 7, 0);

$stmt = $pdo->prepare("SELECT DATE(date) as visit_date, COUNT(*) as total
                       FROM visitors
                       WHERE date >= CURDATE() - INTERVAL 6 DAY
                       GROUP BY DATE(date)");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $row){
    $day = date('w', strtotime($row['visit_date']));
    $visitData[$day] = (int)$row['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Main Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="../../stylesheet/admin.css">
<link rel="stylesheet" href="../../stylesheet/sidebar.css">
<link rel="icon" type="image/png" href="../../images/logo/5thFighterWing-logo.png">
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
            <h6 class="path"> / Dashboard /</h6>
            <h6 class="current-loc">Main Dashboard</h6>
        </div>
        <div class="header-right">
            <i class="fa-regular fa-bell me-3"></i>
            <i class="fa-regular fa-message me-3"></i>
            <div class="user-info">
              <i class="fa-solid fa-user-circle fa-lg me-2"></i>
              <div class="user-text">
                <span class="username"><?= $fullName ?></span>
                <a id="logout-link" class="logout-link" href="logout.php">Logout</a>
              </div>
            </div>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="status-containers mb-4">
        <div class="stats-cards">
          <a href="visitors.php" class="text-decoration-none text-dark">
            <div class="card-value"><?= count(array_filter($visitorStatus, fn($v)=>$v['status']==='Inside')) ?></div>
            <div class="card-label">Current Visitors</div>
          </a>
        </div>

        <div class="stats-cards">
          <a href="vehicles.php" class="text-decoration-none text-dark">
            <div class="card-value"><?= count($latestVehicles) ?></div>
            <div class="card-label">Current Vehicles</div>
          </a>
        </div>

        <div class="stats-cards">
          <a href="pendings.php" class="text-decoration-none text-dark">
            <div class="card-value"><?= count(array_filter($visitorStatus, fn($v)=>$v['status']==='Pending')) ?></div>
            <div class="card-label">Pendings</div>
          </a>
        </div>

        <div class="stats-cards">
          <a href="user_activity.php" class="text-decoration-none text-dark">
            <div class="card-value"><?= count($userActivity) ?></div>
            <div class="card-label">Recent Activity</div>
          </a>
        </div>
      </div>

      <!-- Dashboard Grid -->
      <div class="dashboard-grid">
        <!-- Left Column -->
        <div class="dashboard-left">
          <!-- Daily Visitor Analysis -->
          <div class="chart-card widget-card mb-4">
            <div class="widget-header">
              <h4>Daily Visits Analysis</h4>
            </div>
            <div class="widget-body">
              <canvas id="visitsChart" height="140"></canvas>
            </div>
          </div>

          <!-- Visitor Status Table -->
          <div class="widget-card">
            <div class="widget-header"><h4>Visitor Status</h4></div>
            <div class="widget-body">
              <table class="table table-bordered">
                <thead><tr><th>Name</th><th>Time In</th><th>Time Out</th><th>Date</th><th>Status</th></tr></thead>
                <tbody>
                <?php foreach ($visitorStatus as $v): ?>
                  <tr>
                    <td><?= htmlspecialchars($v['full_name']) ?></td>
                    <td><?= htmlspecialchars($v['time_in']) ?></td>
                    <td><?= htmlspecialchars($v['time_out']) ?></td>
                    <td><?= htmlspecialchars($v['date']) ?></td>
                    <td><?= htmlspecialchars($v['status']) ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Right Column -->
        <div class="dashboard-right">
          <!-- Latest Vehicle Entries -->
          <div class="widget-card mb-4">
            <div class="widget-header"><h4>Latest Vehicle Entry</h4></div>
            <div class="widget-body">
              <ul class="list-group">
                <?php foreach($latestVehicles as $v): ?>
                  <li class="list-group-item"><?= htmlspecialchars($v['vehicle_brand'].' '.$v['vehicle_model'].' - '.$v['owner_name']) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>

          <!-- User Activity -->
          <div class="widget-card">
            <div class="widget-header"><h4>User Activity</h4></div>
            <div class="widget-body">
              <ul class="list-group">
                <?php foreach($userActivity as $u): ?>
                  <li class="list-group-item"><strong><?= htmlspecialchars($u['user_id']) ?></strong> - <?= htmlspecialchars($u['action']) ?> (<?= $u['created_at'] ?>)</li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div> <!-- End dashboard-grid -->

    </div> <!-- End main-content -->
  </div> <!-- End right-panel -->

</div> <!-- End body -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const visitLabels = <?= json_encode($weekDays) ?>;
const visitCounts = <?= json_encode($visitData) ?>;

new Chart(document.getElementById("visitsChart"), {
  type: "bar",
  data: {
    labels: visitLabels,
    datasets: [{
      label: "Visits",
      data: visitCounts,
      backgroundColor: "#36C3EF",
      borderRadius: 6
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: { legend: { display: false } },
    scales: { y: { beginAtZero: true } }
  }
});
</script>
<script src="../../scripts/sidebar.js"></script>
<script src="../../scripts/session_check.js"></script>
</body>
</html>
