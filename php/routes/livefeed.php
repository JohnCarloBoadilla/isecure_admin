<?php
require_once 'auth_check.php';
require_once 'audit_log.php';

// Session check (basic guard)
if (!isset($_SESSION['token'])) {
    header("Location: loginpage.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="../../images/logo/5thFighterWing-logo.png">
    <link rel="stylesheet" href="../../stylesheet/livefeed.css">
    <link rel="stylesheet" href="../../stylesheet/sidebar.css">
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
                    <h6 class="path"> / Dashboard /</h6>
                    <h6 class="current-loc">Live Feed</h6>
                </div>

                <div class="header-right">
                    <i class="fa-regular fa-bell me-3"></i>
                    <i class="fa-regular fa-message me-3"></i>

                    <div class="user-info">
                        <i class="fa-solid fa-user-circle fa-lg me-2"></i>
                        <div class="user-text">
                            <span class="username"><?php echo $fullName ?? 'Unknown User'; ?></span>
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

            <!-- Camera section -->
            <h2>Camera Live Feed</h2>
            <video id="camera" width="640" height="480" autoplay></video>
            <div id="result">Waiting for detection...</div>
            <div id="actions"></div>

        </div>
    </div>

</div>

<script src="../../scripts/sidebar.js"></script>
<script src="../../scripts/livefeed.js"></script>
<script src="../../scripts/session_check.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
