<?php
require 'auth_check.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

// Current user info
$fullName = 'Unknown User';
if (isset($_SESSION['token'])) {
    $stmt = $pdo->prepare("SELECT s.user_id, u.full_name 
                           FROM personnel_sessions s
                           JOIN users u ON s.user_id = u.id
                           WHERE s.token = :token AND s.expires_at > NOW()");
    $stmt->execute([':token' => $_SESSION['token']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) $fullName = htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8');
}

// Fetch all visitors latest
$visitors = $pdo->query("SELECT full_name, date, time_in, time_out, status 
                         FROM visitors ORDER BY date DESC, time_in DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Visitor Status</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="../../images/logo/5thFighterWing-logo.png">
<link rel="stylesheet" href="../../stylesheet/sidebar.css">
</head>
<body>
<div class="body">
    <div class="left-panel">
        <div id="sidebar-container"></div>
    </div>

    <div class="right-panel">
    <div class="main-content">
        <h3>Visitor Status</h3>
        <table class="table table-bordered">
        <thead class="table-light"><tr><th>Name</th><th>Date</th><th>Time In</th><th>Time Out</th><th>Status</th></tr></thead>
        <tbody>
            <?php foreach($visitors as $v): ?>
            <tr>
                <td><?= htmlspecialchars($v['full_name']) ?></td>
                <td><?= $v['date'] ?></td>
                <td><?= $v['time_in'] ?></td>
                <td><?= $v['time_out'] ?></td>
                <td><?= htmlspecialchars($v['status']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    </div>
</div>

<script src="../../scripts/sidebar.js"></script>
</body>
</html>
