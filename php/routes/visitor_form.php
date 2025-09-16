<?php
include_once "../utils/db.php";
include_once "../partials/sidebar.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $stmt = $pdo->prepare("INSERT INTO visitors (visitor_name,address,contact_number,email,id_photo_path,selfie_path,
    vehicle_owner,brand,plate_number,color,model,vehicle_photo_path,reason,personnel_related,datetime_request,status)
    VALUES (:visitor_name,:address,:contact,:email,:id_photo,:selfie,:vehicle_owner,:brand,:plate,:color,:model,:vehicle_photo,:reason,:personnel_related,:datetime_request,'pending')");

        $idPhotoPath = 'uploads/' . basename($_FILES['valid_id']['name']);
    move_uploaded_file($_FILES['valid_id']['tmp_name'], $idPhotoPath);

    $selfiePath = 'uploads/' . basename($_FILES['selfie']['name']);
    move_uploaded_file($_FILES['selfie']['tmp_name'], $selfiePath);

    $vehiclePhotoPath = 'uploads/' . basename($_FILES['vehicle_photo']['name']);
    move_uploaded_file($_FILES['vehicle_photo']['tmp_name'], $vehiclePhotoPath);

    $stmt->execute([
        'visitor_name' => $_POST['visitor_name'],
        'address' => $_POST['address'],
        'contact' => $_POST['contact'],
        'email' => $_POST['email'],
        'id_photo' => $idPhotoPath,
        'selfie' => $selfiePath,
        'vehicle_owner' => $_POST['vehicle_owner'],
        'brand' => $_POST['brand'],
        'plate' => $_POST['plate_number'],
        'color' => $_POST['color'],
        'model' => $_POST['model'],
        'vehicle_photo' => $vehiclePhotoPath,
        'reason' => $_POST['reason'],
        'personnel_related' => $_POST['personnel_related'],
        'datetime_request' => $_POST['datetime_request']
    ]);

    echo "<p>Visitor request submitted successfully!</p>";
}
?>

<h2>Visitor Form</h2>
<form method="post" enctype="multipart/form-data">
<h3>Visitor Information</h3>
<label>Name:</label><input type="text" name="visitor_name" required><br>
<label>Address:</label><input type="text" name="address" required><br>
<label>Contact Number:</label><input type="text" name="contact" required><br>
<label>Email:</label><input type="email" name="email" required><br>
<label>Valid ID:</label><input type="file" name="valid_id" accept="image/*" required><br>
<label>Selfie:</label><input type="file" name="selfie" accept="image/*" required><br>

<h3>Vehicle Information</h3>
<label>Owner:</label><input type="text" name="vehicle_owner" required><br>
<label>Brand:</label><input type="text" name="brand" required><br>
<label>Plate Number:</label><input type="text" name="plate_number" required><br>
<label>Color:</label><input type="text" name="color" required><br>
<label>Model:</label><input type="text" name="model" required><br>
<label>Vehicle Photo:</label><input type="file" name="vehicle_photo" accept="image/*" required><br>

<h3>Schedule Request</h3>
<label>Reason:</label><input type="text" name="reason" required><br>
<label>Personnel Related To:</label><input type="text" name="personnel_related" required><br>
<label>Date & Time:</label><input type="datetime-local" name="datetime_request" required><br><br>

<button type="submit">Submit</button>
</form>