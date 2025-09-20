<?php
    require 'auth_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href=".\images\logo\5thFighterWing-logo.png">
    <link rel="stylesheet" href="../../stylesheet/cameraview.css">
    <title>Main Dashboard</title>
</head>
<body>

<div class="body">

<div class="left-panel">
    <div id="sidebar-container"></div>
</div>

<div class="right-panel">
<div class="main-content">
    
        <div class="main-header">
        <div class="header-left">
            <i class="fa-solid fa-home"></i> 
            <h6 class="path"> / Dashboards /</h6>
            <h6 class="current-loc">Camera View</h6>
        </div>

        <div class="header-right">
            <i class="fa-regular fa-bell me-3"></i>
            <i class="fa-regular fa-message me-3"></i>

            <div class="user-info">
            <i class="fa-solid fa-user-circle fa-lg me-2"></i>
            <div class="user-text">
            <span class="username"><?php echo $fullName; ?></span>
            <a id="logout-link" class="logout-link" href="logout.php">Logout</a>

            <!-- Confirm Modal -->
        <div id="confirmModal" class="modal">
            <div class="modal-content">
                <p id="confirmMessage"></p>
                <div class="modal-actions">
                <button id="confirmYes" class="btn btn-danger">Yes</button>
                    <button id="confirmNo" class="btn btn-secondary">No</button>
                </div>
            </div>
        </div>

    </div>
    </div>
        </div>
    </div>

<div class="camera-feed">
    <h2>Select Camera Feature</h2>
    <div class="features">
        <div class="feature-box" onclick="goToFeature('face')">
            <i class="fa-solid fa-face-smile"></i>
        </div>
        <div class="feature-box" onclick="goToFeature('vehicle')">
            <i class="fa-solid fa-car"></i>
        </div>
        <div class="feature-box" onclick="goToFeature('ocr')">
            <i class="fa-solid fa-id-card"></i>
        </div>
    </div>
</div>

<div class="camera-feed-status">
    <div class="stats-container">
        <h4>Vehicle Recognition Camera</h4>
        <h5>Status: Live <i class="fa-solid fa-circle"></i></h5>
    </div>
    <div class="stats-container">
        <h4>Vehicle Recognition Camera</h4>
        <h5>Status: Live <i class="fa-solid fa-circle"></i></h5>
    </div>
    <div class="stats-container">
        <h4>Vehicle Recognition Camera</h4>
        <h5>Status: Live <i class="fa-solid fa-circle"></i></h5>
    </div>
</div>

</div>

</div>
</div>
<script>
function goToFeature(feature) {
    window.location.href = `livefeed.php?mode=${feature}`;
}
</script>
<script src="../../scripts/sidebar.js"></script>
<script src="../../scripts/cameraview.js"></script>
<script src="../../session_check.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>