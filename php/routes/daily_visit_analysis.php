<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = Database::getConnection();

// Fetch daily visit counts grouped by date (day)
$query = "SELECT DATE(created_at) as visit_date, COUNT(*) as visit_count FROM visitors GROUP BY visit_date ORDER BY visit_date ASC";
$stmt = $db->prepare($query);
$stmt->execute();
$dailyVisits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Additional info: total visits and average visits per day
$totalVisits = 0;
$daysCount = count($dailyVisits);
foreach ($dailyVisits as $visit) {
    $totalVisits += $visit['visit_count'];
}
$averageVisits = $daysCount > 0 ? round($totalVisits / $daysCount, 2) : 0;
?>

<h2>Daily Visit Analysis</h2>
<p>Total Visits: <?= $totalVisits ?></p>
<p>Average Visits per Day: <?= $averageVisits ?></p>

<table border="1">
    <thead>
        <tr><th>Date</th><th>Number of Visits</th></tr>
    </thead>
    <tbody>
        <?php foreach($dailyVisits as $visit): ?>
        <tr>
            <td><?= htmlspecialchars($visit['visit_date']) ?></td>
            <td><?= htmlspecialchars($visit['visit_count']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
