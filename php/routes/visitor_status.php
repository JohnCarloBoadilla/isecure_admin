<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = DBModel::getConnection();

$searchTerm = $_GET['search'] ?? '';

// Fetch recent visitor status list with optional search filter
$query = "SELECT * FROM visitors WHERE 1=1";
$params = [];

if(!empty($searchTerm)){
    $query .= " AND (full_name LIKE :search OR status LIKE :search)";
    $params['search'] = '%' . $searchTerm . '%';
}

$query .= " ORDER BY created_at DESC LIMIT 20";

$stmt = $db->prepare($query);
$stmt->execute($params);
$visitorStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Visitor Status</h2>

<form method="get">
    <label>Search:</label>
    <input type="text" name="search" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Search visitor status...">
    <button type="submit">Search</button>
</form>

<table border="1">
    <thead>
        <tr><th>Visitor Name</th><th>Date/Time</th><th>Status</th></tr>
    </thead>
    <tbody>
        <?php foreach($visitorStatus as $visitor): ?>
        <tr>
            <td><?= htmlspecialchars($visitor['full_name'] ?? '') ?></td>
            <td><?= htmlspecialchars($visitor['created_at'] ?? '') ?></td>
            <td><?= htmlspecialchars($visitor['status'] ?? '') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
