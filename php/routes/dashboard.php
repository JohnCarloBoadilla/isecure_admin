<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = Database::getConnection();

// Fetch counts for dashboard cards
// Current Visitors count (status = 'approved' and time_out is null)
$stmtVisitors = $db->prepare("SELECT COUNT(*) as count FROM visitors WHERE status = 'approved' AND (time_out IS NULL OR time_out = '')");
$stmtVisitors->execute();
$currentVisitors = $stmtVisitors->fetch()['count'] ?? 0;

// Current Vehicles count (status = 'approved')
$stmtVehicles = $db->prepare("SELECT COUNT(*) as count FROM vehicles WHERE status = 'approved'");
$stmtVehicles->execute();
$currentVehicles = $stmtVehicles->fetch()['count'] ?? 0;

// Pendings count (status = 'pending' in visitors)
$stmtPendings = $db->prepare("SELECT COUNT(*) as count FROM visitors WHERE status = 'pending'");
$stmtPendings->execute();
$pendings = $stmtPendings->fetch()['count'] ?? 0;

// Reports count (assuming reports table exists)
$stmtReports = $db->prepare("SELECT COUNT(*) as count FROM reports");
$stmtReports->execute();
$reports = $stmtReports->fetch()['count'] ?? 0;

// Latest Vehicle Entries (limit 5)
$stmtLatestVehicles = $db->prepare("SELECT brand, owner FROM vehicles ORDER BY logged_at DESC LIMIT 5");
$stmtLatestVehicles->execute();
$latestVehicles = $stmtLatestVehicles->fetchAll();

// Visitor Status (limit 5 recent visitors)
$stmtVisitorStatus = $db->prepare("SELECT visitor_name, time_in, time_out, datetime_request FROM visitors ORDER BY datetime_request DESC LIMIT 5");
$stmtVisitorStatus->execute();
$visitorStatusList = $stmtVisitorStatus->fetchAll();

// User Activity (dummy data for now)
$userActivities = [
    ['name' => 'John Doe', 'activity' => 'Lorem ipsum dolor sit amet.'],
    ['name' => 'John Doe', 'activity' => 'Lorem ipsum dolor sit amet.'],
    ['name' => 'John Doe', 'activity' => 'Lorem ipsum dolor sit amet.'],
    ['name' => 'John Doe', 'activity' => 'Lorem ipsum dolor sit amet.'],
];
?>

<h2>Dashboard</h2>

<!-- Info Cards -->
<div style="display:flex; gap:10px; margin-bottom:20px;">
    <div style="background:#5bc0de; color:#fff; padding:15px; flex:1; border-radius:5px;">
        <h1><?= $currentVisitors < 10 ? '0' . $currentVisitors : $currentVisitors ?></h1>
        <p>Current Visitors</p>
        <small>updated 2hrs ago</small>
    </div>
    <div style="background:#5bc0de; color:#fff; padding:15px; flex:1; border-radius:5px;">
        <h1><?= $currentVehicles < 10 ? '0' . $currentVehicles : $currentVehicles ?></h1>
        <p>Current Vehicles</p>
        <small>updated 2hrs ago</small>
    </div>
    <div style="background:#5bc0de; color:#fff; padding:15px; flex:1; border-radius:5px;">
        <h1><?= $pendings < 10 ? '0' . $pendings : $pendings ?></h1>
        <p>Pendings</p>
        <small>updated 2hrs ago</small>
    </div>
    <div style="background:#5bc0de; color:#fff; padding:15px; flex:1; border-radius:5px;">
        <h1><?= $reports < 10 ? '0' . $reports : $reports ?></h1>
        <p>Reports</p>
        <small>updated 2hrs ago</small>
    </div>
</div>

<!-- Daily Visits Analysis -->
<section style="margin-bottom:20px; border:1px solid #ccc; padding:10px; border-radius:5px;">
    <h3>Daily Visits Analysis</h3>
    <p>For more details about this analysis, please proceed to the visitation board.</p>
    <div style="height:200px; background:#e9f7fd; text-align:center; line-height:200px; color:#007bff;">
        Bar Chart Placeholder
    </div>
</section>

<!-- Latest Vehicle Entry -->
<section style="margin-bottom:20px; border:1px solid #ccc; padding:10px; border-radius:5px; float:right; width:30%;">
    <h3>Latest Vehicle Entry</h3>
    <ul>
        <?php foreach($latestVehicles as $vehicle): ?>
            <li><?= htmlspecialchars($vehicle['brand']) ?> - John Doe</li>
        <?php endforeach; ?>
    </ul>
    <a href="vehicle.php">View full information</a>
</section>

<!-- Visitor Status -->
<section style="margin-bottom:20px; border:1px solid #ccc; padding:10px; border-radius:5px; clear:both;">
    <h3>Visitor Status</h3>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
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
            <?php foreach($visitorStatusList as $visitor): ?>
            <tr>
                <td><?= htmlspecialchars($visitor['visitor_name']) ?></td>
                <td style="color:green;"><?= htmlspecialchars($visitor['time_in'] ?? '00:00 AM') ?></td>
                <td style="color:red;"><?= htmlspecialchars($visitor['time_out'] ?? '00:00 PM') ?></td>
                <td><?= htmlspecialchars(date('m/d/Y', strtotime($visitor['datetime_request']))) ?></td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<!-- User Activity -->
<section style="border:1px solid #ccc; padding:10px; border-radius:5px; width:30%; float:right;">
    <h3>User Activity</h3>
    <ul>
        <?php foreach($userActivities as $activity): ?>
            <li><?= htmlspecialchars($activity['name']) ?> - <?= htmlspecialchars($activity['activity']) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="user_activity.php">View all activity</a>
</section>
