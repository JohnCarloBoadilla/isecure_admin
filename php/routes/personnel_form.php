<?php
require_once '../models/Database.php';
include_once "partials/sidebar.php";

$db = Database::getConnection();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['name'])){
    $stmt = $db->prepare("INSERT INTO personnels (name, department, position, contact, email, face_photo_path)
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
    // Set a success message in session and redirect back to the referring page or default to personnel_accounts.php
    session_start();
    $_SESSION['message'] = "Personnel added successfully.";
    $redirectUrl = $_POST['redirect'] ?? 'personnel_accounts.php';
    header("Location: $redirectUrl");
    exit;
}
?>

<h2>Add Personnel</h2>

<?php
session_start();
if(isset($_SESSION['message'])){
    echo "<script>alert('" . addslashes($_SESSION['message']) . "');</script>";
    unset($_SESSION['message']);
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? 'personnel_accounts.php') ?>">
    <label>Name:</label><input type="text" name="name" required><br>
    <label>Department:</label><input type="text" name="department" required><br>
    <label>Position:</label><input type="text" name="position" required><br>
    <label>Contact:</label><input type="text" name="contact" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Face Photo:</label><input type="file" name="face_photo" required><br>
    <button type="submit">Register</button>
</form>
