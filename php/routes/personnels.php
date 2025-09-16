<?php
include_once "../utils/db.php";
include_once "../partials/sidebar.php";

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['name'])){
    $stmt = $pdo->prepare("INSERT INTO personnels (name, department, position, contact, email, face_photo_path)
    VALUES (:name,:department,:position,:contact,:email,:face_photo)");
    
    $photoPath = 'uploads/' . basename($_FILES['face_photo']['name']);
    move_uploaded_file($_FILES['face_photo']['tmp_name'], $photoPath);

    $stmt->execute([
        'name'=>$_POST['name'],
        'department'=>$_POST['department'],
        'position'=>$_POST['position'],
        'contact'=>$_POST['contact'],
        'email'=>$_POST['email'],
        'face_photo'=>$photoPath
    ]);
    echo "<p>Personnel added successfully.</p>";
}

$stmt = $pdo->query("SELECT * FROM personnels ORDER BY name ASC");
$personnels = $stmt->fetchAll();
?>

<h2>Personnel Management</h2>
<form method="post" enctype="multipart/form-data">
    <label>Name:</label><input type="text" name="name" required><br>
    <label>Department:</label><input type="text" name="department" required><br>
    <label>Position:</label><input type="text" name="position" required><br>
    <label>Contact:</label><input type="text" name="contact" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Face Photo:</label><input type="file" name="face_photo" required><br>
    <button type="submit">Register</button>
</form>

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
