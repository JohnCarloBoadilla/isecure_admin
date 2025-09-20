<?php
require_once '../models/Database.php';
include_once "utils/fastapi_client.php";
include_once "partials/sidebar.php";

$db = DBModel::getConnection();
$statusFilter = $_GET['status'] ?? 'all';
$searchTerm = $_GET['search'] ?? '';

$query = "SELECT * FROM visitors WHERE 1=1";
$params = [];

if($statusFilter != 'all'){
    $query .= " AND status = :status";
    $params['status'] = $statusFilter;
}

if(!empty($searchTerm)){
    $query .= " AND (visitor_name LIKE :search OR contact_number LIKE :search OR email LIKE :search)";
    $params['search'] = '%' . $searchTerm . '%';
}

$stmt = $db->prepare($query);
$stmt->execute($params);
$visitors = $stmt->fetchAll();
?>

<a href="visitor_form.php"><button type="button">Add Visitor</button></a>

<h2>Visitors List</h2>
<form method="get">
    <label>Filter by Status:</label>
    <select name="status" onchange="this.form.submit()">
        <option value="all" <?= $statusFilter=='all'?'selected':'' ?>>All</option>
        <option value="pending" <?= $statusFilter=='pending'?'selected':'' ?>>Pending</option>
        <option value="approved" <?= $statusFilter=='approved'?'selected':'' ?>>Approved</option>
        <option value="denied" <?= $statusFilter=='denied'?'selected':'' ?>>Denied</option>
    </select>
    &nbsp;&nbsp;
    <label>Search:</label>
    <input type="text" name="search" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Search visitors...">
    <button type="submit">Search</button>
</form>

<table border="1">
    <thead>
        <tr>
            <th>Name</th><th>Contact</th><th>Email</th><th>Vehicle Plate</th>
            <th>Detected Plate</th><th>Detected Color</th><th>Reason</th><th>Date/Time</th>
            <th>Status</th><th>Recognized Personnel</th><th>ID Info</th><th>Time In</th><th>Time Out</th>
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
            <td><?= htmlspecialchars($v['time_in'] ?? '-') ?></td>
            <td><?= htmlspecialchars($v['time_out'] ?? '-') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
