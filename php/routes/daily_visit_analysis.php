<?php
require 'auth_check.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

// Visitor counts per date
$visitorData = [];
$stmt = $pdo->query("SELECT date, COUNT(*) as count FROM visitors GROUP BY date ORDER BY date ASC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $visitorData['dates'][] = $row['date'];
    $visitorData['counts'][] = (int)$row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Daily Visitor Analysis</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container mt-4">
  <h3>Daily Visitor Analysis</h3>
  <canvas id="visitsChart" height="200"></canvas>
</div>
<script>
const ctx = document.getElementById("visitsChart");
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($visitorData['dates'] ?? []) ?>,
        datasets: [{
            label: 'Visitors',
            data: <?= json_encode($visitorData['counts'] ?? []) ?>,
            backgroundColor: '#36C3EF'
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});
</script>
</body>
</html>
