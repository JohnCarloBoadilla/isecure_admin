<?php
include_once "../utils/db.php";
include_once "../utils/fastapi_client.php";
include_once "../partials/sidebar.php";

$statusFilter = $_GET['status'] ?? 'all';
$query = "SELECT * FROM visitors";
if($statusFilter != 'all'){
    $query .= " WHERE status = :status";
}
$stmt = $pdo->prepare($query);
if($statusFilter != 'all'){
    $stmt->execute(['status' => $statusFilter]);
}else{
    $stmt->execute();
}
$visitors = $stmt->fetchAll();
?>

<h2>Visitors List</h2>
<form method="get">
    <label>Filter by Status:</label>
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
            <th>Name</th><th>Contact</th><th>Email</th><th>Vehicle Plate</th>
            <th>Detected Plate</th><th>Detected Color</th><th>Reason</th><th>Date/Time</th>
            <th>Status</th><th>Recognized Personnel</th><th>ID Info</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($visitors as $v): ?>
        <tr>
            <td><?= htmlspecialchars($v['visitor_name']) ?></td>
            <td><?= htmlspecialchars($v['contact_number']) ?></td>
            <td><?= htmlspecialchars($v['email']) ?></td>
            <td><?= htmlspecialchars($v['vehicle_plate']) ?></td>
            <td><?= htmlspecialchars($v['detected_plate'] ?? '-') ?></td>
            <td><?= htmlspecialchars($v['vehicle_color'] ?? '-') ?></td>
            <td><?= htmlspecialchars($v['reason']) ?></td>
            <td><?= htmlspecialchars($v['datetime_request']) ?></td>
            <td><?= htmlspecialchars($v['status']) ?></td>
            <td><?= htmlspecialchars($v['recognized_person'] ?? '-') ?></td>
            <td>ID: <?= htmlspecialchars($v['id_number'] ?? '-') ?> | DOB: <?= htmlspecialchars($v['dob'] ?? '-') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>