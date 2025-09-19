<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = Database::getConnection();
$typeFilter = $_GET['type'] ?? 'all';
$statusFilter = $_GET['status'] ?? 'all';

$query = "SELECT * FROM logs WHERE 1=1";
$params = [];

if($typeFilter != 'all') { $query .= " AND type = :type"; $params['type'] = $typeFilter; }
if($statusFilter != 'all') { $query .= " AND status = :status"; $params['status'] = $statusFilter; }

$stmt = $db->prepare($query);
$stmt->execute($params);
$logs = $stmt->fetchAll();
?>

<h2>All Logs</h2>
<form method="get">
    <label>Type:</label>
    <select name="type" onchange="this.form.submit()">
        <option value="all" <?= $typeFilter=='all'?'selected':'' ?>>All</option>
        <option value="visitor" <?= $typeFilter=='visitor'?'selected':'' ?>>Visitor</option>
        <option value="vehicle" <?= $typeFilter=='vehicle'?'selected':'' ?>>Vehicle</option>
    </select>
    <label>Status:</label>
    <select name="status" onchange="this.form.submit()">
        <option value="all" <?= $statusFilter=='all'?'selected':'' ?>>All</option>
        <option value="pending" <?= $statusFilter=='pending'?'selected':'' ?>>Pending</option>
        <option value="approved" <?= $statusFilter=='approved'?'selected':'' ?>>Approved</option>
        <option value="denied" <?= $statusFilter=='denied'?'selected':'' ?>>Denied</option>
    </select>
</form>

<table border="1">
    <thead>
        <tr>
            <th>Type</th><th>Name</th><th>Owner</th><th>Plate Number</th>
            <th>Reason</th><th>Description</th><th>Status</th><th>Date/Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($logs as $log): ?>
        <tr>
            <td><?= htmlspecialchars($log['type']) ?></td>
            <td><?= htmlspecialchars($log['name'] ?? '-') ?></td>
            <td><?= htmlspecialchars($log['owner'] ?? '-') ?></td>
            <td><?= htmlspecialchars($log['plate_number'] ?? '-') ?></td>
            <td><?= htmlspecialchars($log['reason'] ?? '-') ?></td>
            <td><?= htmlspecialchars($log['description'] ?? '-') ?></td>
            <td><?= htmlspecialchars($log['status'] ?? '-') ?></td>
            <td><?= htmlspecialchars($log['logged_at'] ?? '-') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>