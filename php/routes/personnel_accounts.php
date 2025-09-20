<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";


$db = DBModel::getConnection();

$searchTerm = $_GET['search'] ?? '';

// Handle delete request
if(isset($_GET['delete_id'])){
    $deleteId = intval($_GET['delete_id']);
    $stmt = $db->prepare("DELETE FROM personnels WHERE id = :id");
    $stmt->execute(['id' => $deleteId]);
    echo "<p>Personnel deleted successfully.</p>";
}

// Handle add or update request
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    if($id){ // Update
        $stmt = $db->prepare("UPDATE personnels SET name=:name, department=:department, position=:position, contact=:contact, email=:email WHERE id=:id");
        $stmt->execute([
            'name'=>$name,
            'department'=>$department,
            'position'=>$position,
            'contact'=>$contact,
            'email'=>$email,
            'id'=>$id
        ]);
        echo "<p>Personnel updated successfully.</p>";
    } else { // Insert
        $stmt = $db->prepare("INSERT INTO personnels (name, department, position, contact, email) VALUES (:name, :department, :position, :contact, :email)");
        $stmt->execute([
            'name'=>$name,
            'department'=>$department,
            'position'=>$position,
            'contact'=>$contact,
            'email'=>$email
        ]);
        echo "<p>Personnel added successfully.</p>";
    }
}

// Fetch personnels list with optional search filter
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

// If editing, fetch personnel data
$editPersonnel = null;
if(isset($_GET['edit_id'])){
    $editId = intval($_GET['edit_id']);
    $stmt = $db->prepare("SELECT * FROM personnels WHERE id = :id");
    $stmt->execute(['id' => $editId]);
    $editPersonnel = $stmt->fetch();
}
?>

<h2>Personnel Accounts</h2>

<form method="get">
    <label>Search:</label>
    <input type="text" name="search" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Search personnel accounts...">
    <button type="submit">Search</button>
</form>

<a href="personnel_form.php"><button type="button">Add Personnel</button></a>

<h3>All Personnel</h3>
<table border="1">
    <thead>
        <tr><th>Name</th><th>Department</th><th>Position</th><th>Contact</th><th>Email</th><th>Actions</th></tr>
    </thead>
    <tbody>
        <?php foreach($personnels as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= htmlspecialchars($p['department']) ?></td>
            <td><?= htmlspecialchars($p['position']) ?></td>
            <td><?= htmlspecialchars($p['contact']) ?></td>
            <td><?= htmlspecialchars($p['email']) ?></td>
            <td>
                <a href="personnel_accounts.php?edit_id=<?= $p['id'] ?>">Edit</a> |
                <a href="personnel_accounts.php?delete_id=<?= $p['id'] ?>" onclick="return confirm('Are you sure you want to delete this personnel?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
