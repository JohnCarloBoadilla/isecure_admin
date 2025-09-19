<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = Database::getConnection();

$searchTerm = $_GET['search'] ?? '';

$query = "SELECT * FROM personnels WHERE 1=1";
$params = [];

if(!empty($searchTerm)){
    $query .= " AND (name LIKE :search OR department LIKE :search OR position LIKE :search OR contact LIKE :search OR email LIKE :search)";
    $params['search'] = '%' . $searchTerm . '%';
}

$query .= " ORDER BY name ASC";

$stmt = $db->prepare($query);
$stmt->execute($params);
$personnels = $stmt->fetchAll();
?>

<h2>Personnel Management</h2>

<form method="get">
    <label>Search:</label>
    <input type="text" name="search" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Search personnels...">
    <button type="submit">Search</button>
</form>

<a href="personnel_form.php"><button type="button">Add Personnel</button></a>

<h3>All Personnel</h3>
<table border="1">
    <thead>
        <tr><th>Name</th><th>Department</th><th>Position</th><th>Contact</th><th>Email</th></tr>
    </thead>
    <tbody>
        <?php foreach($personnels as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= htmlspecialchars($p['department']) ?></td>
            <td><?= htmlspecialchars($p['position']) ?></td>
            <td><?= htmlspecialchars($p['contact']) ?></td>
            <td><?= htmlspecialchars($p['email']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
