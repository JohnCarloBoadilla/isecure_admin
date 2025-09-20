<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = DBModel::getConnection();

// Check if status column exists, if not, get all visitors
try {
    $stmt = $db->query("SELECT * FROM visitors WHERE status='pending' ORDER BY datetime_request DESC");
    $pendingVisitors = $stmt->fetchAll();
} catch (PDOException $e) {
    // If status column doesn't exist, get all visitors
    $stmt = $db->query("SELECT * FROM visitors ORDER BY id DESC");
    $pendingVisitors = $stmt->fetchAll();
}
?>

<h2>Pending Visitors</h2>
<table border="1">
    <thead>
        <tr>
            <th>Name</th><th>Contact</th><th>Email</th>
            <th>Plate</th><th>Detected Plate</th><th>Detected Color</th>
            <th>Reason</th><th>Date/Time</th><th>Recognized Personnel</th>
            <th>ID Info</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pendingVisitors as $v): ?>
        <tr>
            <td><?= htmlspecialchars($v['visitor_name']) ?></td>
            <td><?= htmlspecialchars($v['contact_number']) ?></td>
            <td><?= htmlspecialchars($v['email']) ?></td>
            <td><?= htmlspecialchars($v['vehicle_plate']) ?></td>
            <td><?= htmlspecialchars($v['detected_plate'] ?? '-') ?></td>
            <td><?= htmlspecialchars($v['vehicle_color'] ?? '-') ?></td>
            <td><?= htmlspecialchars($v['reason']) ?></td>
            <td><?= htmlspecialchars($v['datetime_request']) ?></td>
            <td><?= htmlspecialchars($v['recognized_person'] ?? '-') ?></td>
            <td>ID: <?= htmlspecialchars($v['id_number'] ?? '-') ?> | DOB: <?= htmlspecialchars($v['dob'] ?? '-') ?></td>
            <td>
                <form method="post" action="update_status.php">
                    <input type="hidden" name="id" value="<?= $v['id'] ?>">
                    <button type="submit" name="action" value="approve">Approve</button>
                    <button type="submit" name="action" value="deny">Deny</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
