<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = Database::getConnection();
$statusFilter = $_GET['status'] ?? 'all';
$query = "SELECT * FROM vehicles";
$params = [];
if($statusFilter != 'all'){ $query.=" WHERE status=:status"; $params=['status'=>$statusFilter]; }

$stmt = $db->prepare($query);
$stmt->execute($params);
$vehicles = $stmt->fetchAll();
?>

<h2>Vehicle Management</h2>
<form method="get">
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
<th>Owner</th><th>Brand</th><th>Plate Number</th><th>Color</th><th>Model</th><th>Status</th><th>Date/Time</th>
</tr>
</thead>
<tbody>
<?php foreach($vehicles as $v): ?>
<tr>
<td><?= htmlspecialchars($v['owner']) ?></td>
<td><?= htmlspecialchars($v['brand']) ?></td>
<td><?= htmlspecialchars($v['plate_number']) ?></td>
<td><?= htmlspecialchars($v['color']) ?></td>
<td><?= htmlspecialchars($v['model']) ?></td>
<td><?= htmlspecialchars($v['status']) ?></td>
<td><?= htmlspecialchars($v['logged_at']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>