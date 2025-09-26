<?php
require 'auth_check.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

// Fetch latest 10 vehicles
$vehicles = $pdo->query("SELECT vehicle_type AS vehicle_brand, '' AS vehicle_model, owner_name AS vehicle_owner, created_at 
                         FROM vehicles ORDER BY created_at DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Latest Vehicle Entry</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h3>Latest Vehicle Entry</h3>
  <table class="table table-bordered">
    <thead class="table-light"><tr><th>Brand</th><th>Model</th><th>Owner</th><th>Entry Time</th></tr></thead>
    <tbody>
    <?php foreach($vehicles as $v): ?>
      <tr>
        <td><?= htmlspecialchars($v['vehicle_brand']) ?></td>
        <td><?= htmlspecialchars($v['vehicle_model']) ?></td>
        <td><?= htmlspecialchars($v['vehicle_owner']) ?></td>
        <td><?= $v['created_at'] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>
