<?php
require 'auth_check.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

// Fetch latest 20 user activities
$activities = $pdo->query("SELECT user_id, action, created_at FROM admin_audit_logs ORDER BY created_at DESC LIMIT 20")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Activity</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="../../images/logo/5thFighterWing-logo.png">
</head>
<body>
<div class="container mt-4">
  <h3>User Activity Logs</h3>
  <table class="table table-bordered">
    <thead class="table-light"><tr><th>User ID</th><th>Action</th><th>Time</th></tr></thead>
    <tbody>
      <?php foreach($activities as $a): ?>
        <tr>
          <td><?= htmlspecialchars($a['user_id']) ?></td>
          <td><?= htmlspecialchars($a['action']) ?></td>
          <td><?= $a['created_at'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>
