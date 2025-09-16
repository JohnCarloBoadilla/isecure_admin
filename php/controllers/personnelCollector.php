<?php
require_once '../models/Personnel.php';

$action = $_GET['action'] ?? '';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name = $_POST['name'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $face_photo = $_FILES['face_photo']['name'];
    move_uploaded_file($_FILES['face_photo']['tmp_name'], "../uploads/$face_photo");

    Personnel::add([
        'name'=>$name,
        'department'=>$department,
        'position'=>$position,
        'contact'=>$contact,
        'email'=>$email,
        'face_photo'=>"uploads/$face_photo"
    ]);

    header("Location: ../routes/personnels.php");
    exit;
}

if($action==='delete'){
    $id = $_GET['id'];
    Personnel::delete($id);
    header("Location: ../routes/personnels.php");
    exit;
}
