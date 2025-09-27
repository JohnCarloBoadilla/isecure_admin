<?php
require 'auth_check.php';
require 'audit_log.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();


$fullName = 'Unknown User';
$role = 'Unknown Role';

// Session validation
if (!isset($_SESSION['token'])) {
    header("Location: loginpage.php");
    exit;
}
$stmt = $pdo->prepare("SELECT * FROM personnel_sessions WHERE token = :token AND expires_at > NOW()");
$stmt->execute([':token' => $_SESSION['token']]);
$session = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$session) {
    session_unset();
    session_destroy();
    header("Location: loginpage.php");
    exit;
}

// Fetch user info
if (!empty($session['user_id'])) {
    $stmt = $pdo->prepare("SELECT full_name, role FROM users WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $session['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $fullName = htmlspecialchars($user['full_name'] ?? 'Unknown User', ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars($user['role'] ?? 'Unknown Role', ENT_QUOTES, 'UTF-8');
    } else {
        session_unset();
        session_destroy();
        header("Location: loginpage.php");
        exit;
    }
} else {
    session_unset();
    session_destroy();
    header("Location: loginpage.php");
    exit;
}

// --- New Integration: fetch visitor/personnel info based on FastAPI recognition ---
$recognizedId = $_GET['id'] ?? null;
$recognizedType = $_GET['type'] ?? null;
$personData = [];

if ($recognizedId && $recognizedType) {
    if ($recognizedType === 'visitor') {
        $stmt = $pdo->prepare("SELECT * FROM visitors WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $recognizedId]);
        $personData = $stmt->fetch(PDO::FETCH_ASSOC);
    } elseif ($recognizedType === 'personnel') {
        $stmt = $pdo->prepare("SELECT * FROM personnels WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $recognizedId]);
        $personData = $stmt->fetch(PDO::FETCH_ASSOC);
    }
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
    <link rel="stylesheet" href="../../stylesheet/personinformation.css">
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
                    <h6 class="current-loc">Person Information</h6>
                </div>

                <div class="header-right">
                    <i class="fa-regular fa-bell me-3"></i>
                    <i class="fa-regular fa-message me-3"></i>
                    <div class="user-info">
                        <i class="fa-solid fa-user-circle fa-lg me-2"></i>
                        <div class="user-text">
                            <span class="username"><?php echo $fullName; ?></span>
                            <a id="logout-link" class="logout-link" href="logout.php">Logout</a>

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

            <div class="person-information">
                <div class="face">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="information">
                    <label>Name: <span id="info-name"><?php echo htmlspecialchars($personData['full_name'] ?? ''); ?></span></label><br>
                    <label>Age: <span id="info-age"><?php echo htmlspecialchars($personData['age'] ?? ''); ?></span></label><br>
                    <label>Gender: <span id="info-gender"><?php echo htmlspecialchars($personData['gender'] ?? ''); ?></span></label><br>
                    <label>Contact Number: <span id="info-contact"><?php echo htmlspecialchars($personData['contact_number'] ?? ''); ?></span></label><br>
                    <label>Address: <span id="info-address"><?php echo htmlspecialchars($personData['address'] ?? ''); ?></span></label><br>    
                    <label>ID/Pass Number: <span id="info-id"><?php echo htmlspecialchars($personData['id_pass_number'] ?? ''); ?></span></label><br>
                    <label>Affiliation / Company: <span id="info-affiliation"><?php echo htmlspecialchars($personData['affiliation'] ?? ''); ?></span></label><br>
                    <label>Purpose of Visit: <span id="info-purpose"><?php echo htmlspecialchars($personData['purpose'] ?? ''); ?></span></label><br>
                    <label>Access Level: <span id="info-access"><?php echo htmlspecialchars($personData['access_level'] ?? ''); ?></span></label>
                </div>
            </div>

            <section class="person-data">
                <div class="data-container">
                    <!-- Any additional dynamic data -->
                </div>
            </section>
        </div>
    </div>
</div>

<script src="../../scripts/sidebar.js"></script>
<script src="../../scripts/personinformation.js"></script>
<script src="../../scripts/session_check.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
