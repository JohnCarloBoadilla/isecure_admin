<?php
require 'auth_check.php';
require 'audit_log.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

// --- Session info ---
$fullName = 'Unknown User';
$role = 'Unknown Role';

if (!isset($_SESSION['token'])) {
    header("Location: loginpage.php");
    exit;
}

// Validate session token
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
        $fullName = htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8');
    }
}

// --- Fetch all visitation requests ---
$stmt = $pdo->prepare("SELECT * FROM visitation_requests ORDER BY created_at DESC");
$stmt->execute();
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pendings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../stylesheet/pendings.css">
<link rel="stylesheet" href="../../stylesheet/sidebar.css">
<link rel="icon" type="image/png" href="../../images/logo/5thFighterWing-logo.png">
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
          <h6 class="current-loc">Personnels</h6>
        </div>
        <div class="header-right">
          <i class="fa-regular fa-bell me-3"></i>
          <i class="fa-regular fa-message me-3"></i>
          <div class="user-info">
            <i class="fa-solid fa-user-circle fa-lg me-2"></i>
            <div class="user-text">
              <span class="username"><?php echo $fullName; ?></span>
              <a id="logout-link" class="logout-link" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-4">
        <h3>Visitation Requests</h3>
        <ul class="nav nav-tabs" id="requestTabs">
          <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#pendingTab">Pending</a></li>
          <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#approvedTab">Approved</a></li>
          <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#rejectedTab">Rejected</a></li>
        </ul>

        <div class="tab-content mt-3">
          <!-- Pending -->
          <div class="tab-pane fade show active" id="pendingTab">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Visitor</th><th>Date</th><th>Time</th><th>Status</th><th>Actions</th>
                </tr>
              </thead>
              <tbody id="pendingTable">
                <?php foreach ($requests as $req): ?>
                  <?php if (!empty($req['status']) && strtolower($req['status']) === 'pending'): ?>
                    <tr data-id="<?= $req['id'] ?>">
                      <td><?= htmlspecialchars($req['visitor_name']) ?></td>
                      <td><?= htmlspecialchars($req['visit_date']) ?></td>
                      <td><?= htmlspecialchars($req['visit_time']) ?></td>
                      <td><span class="badge bg-warning text-dark"><?= $req['status'] ?></span></td>
                      <td>
                        <button class="btn btn-primary btn-sm view-btn"
                          data-id="<?= $req['id'] ?>"
                          data-name="<?= htmlspecialchars($req['visitor_name']) ?>"
                          data-home="<?= htmlspecialchars($req['home_address']) ?>"
                          data-contact="<?= htmlspecialchars($req['contact_number']) ?>"
                          data-email="<?= htmlspecialchars($req['email']) ?>"
                          data-date="<?= $req['visit_date'] ?>"
                          data-time="<?= $req['visit_time'] ?>"
                          data-reason="<?= htmlspecialchars($req['reason']) ?>"
                          data-personnel="<?= htmlspecialchars($req['personnel_related']) ?>"
                          data-vehicle="<?= htmlspecialchars($req['vehicle_brand'].' '.$req['vehicle_model'].' '.$req['plate_number'].' '.$req['vehicle_color']) ?>"
                          data-validid="<?= htmlspecialchars($req['valid_id_path']) ?>"
                          data-selfie="<?= htmlspecialchars($req['selfie_photo_path']) ?>"
                          data-vehiclephoto="<?= htmlspecialchars($req['vehicle_photo_path']) ?>"
                        >View</button>
                      </td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Approved -->
          <div class="tab-pane fade" id="approvedTab">
            <table class="table table-bordered">
              <thead><tr><th>Visitor</th><th>Date</th><th>Time</th><th>Status</th></tr></thead>
              <tbody id="approvedTable">
                <?php foreach ($requests as $req): ?>
                  <?php if (!empty($req['status']) && strtolower($req['status']) === 'approved'): ?>
                    <tr>
                      <td><?= htmlspecialchars($req['visitor_name']) ?></td>
                      <td><?= htmlspecialchars($req['visit_date']) ?></td>
                      <td><?= htmlspecialchars($req['visit_time']) ?></td>
                      <td><span class="badge bg-success"><?= $req['status'] ?></span></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Rejected -->
          <div class="tab-pane fade" id="rejectedTab">
            <table class="table table-bordered">
              <thead><tr><th>Visitor</th><th>Date</th><th>Time</th><th>Status</th></tr></thead>
              <tbody id="rejectedTable">
                <?php foreach ($requests as $req): ?>
                  <?php if (!empty($req['status']) && strtolower($req['status']) === 'rejected'): ?>
                    <tr>
                      <td><?= htmlspecialchars($req['visitor_name']) ?></td>
                      <td><?= htmlspecialchars($req['visit_date']) ?></td>
                      <td><?= htmlspecialchars($req['visit_time']) ?></td>
                      <td><span class="badge bg-danger"><?= $req['status'] ?></span></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Visitation Request Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Name:</strong> <span id="modalName"></span></p>
        <p><strong>Home Address:</strong> <span id="modalHome"></span></p>
        <p><strong>Contact:</strong> <span id="modalContact"></span></p>
        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
        <p><strong>Date:</strong> <span id="modalDate"></span></p>
        <p><strong>Time:</strong> <span id="modalTime"></span></p>
        <p><strong>Reason:</strong> <span id="modalReason"></span></p>
        <p><strong>Personnel Related:</strong> <span id="modalPersonnel"></span></p>
        <p><strong>Vehicle Info:</strong> <span id="modalVehicle"></span></p>
        <p><strong>Valid ID:</strong><br><img id="modalValidId" src="" alt="Valid ID" class="img-fluid"></p>
        <p><strong>Selfie:</strong><br><img id="modalSelfie" src="" alt="Selfie" class="img-fluid"></p>
        <p><strong>Vehicle Photo:</strong><br><img id="modalVehiclePhoto" src="" alt="Vehicle" class="img-fluid"></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success action-btn" data-action="approved">Approve</button>
        <button class="btn btn-danger action-btn" data-action="rejected">Reject</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
const viewModal = new bootstrap.Modal(document.getElementById("viewModal"));

let selectedRequestId = null;
let selectedAction = null;

// Open view modal
document.querySelectorAll(".view-btn").forEach(btn => {
  btn.addEventListener("click", () => {
    selectedRequestId = btn.dataset.id;
    document.getElementById("modalName").textContent = btn.dataset.name;
    document.getElementById("modalHome").textContent = btn.dataset.home;
    document.getElementById("modalContact").textContent = btn.dataset.contact;
    document.getElementById("modalEmail").textContent = btn.dataset.email;
    document.getElementById("modalDate").textContent = btn.dataset.date;
    document.getElementById("modalTime").textContent = btn.dataset.time;
    document.getElementById("modalReason").textContent = btn.dataset.reason;
    document.getElementById("modalPersonnel").textContent = btn.dataset.personnel;
    document.getElementById("modalVehicle").textContent = btn.dataset.vehicle;
    document.getElementById("modalValidId").src = btn.dataset.validid || "placeholder.png";
    document.getElementById("modalSelfie").src = btn.dataset.selfie || "placeholder.png";
    document.getElementById("modalVehiclePhoto").src = btn.dataset.vehiclephoto || "placeholder.png";
    viewModal.show();
  });
});

// Approve/Reject action
document.querySelectorAll(".action-btn").forEach(btn => {
  btn.addEventListener("click", () => {
    const action = btn.dataset.action;
    if (!selectedRequestId) return;

    if (confirm(`Are you sure you want to ${action} this visitation request?`)) {
      fetch("approve_visitation_request.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `id=${encodeURIComponent(selectedRequestId)}&action=${encodeURIComponent(action)}`
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          const row = document.querySelector(`tr[data-id="${selectedRequestId}"]`);
          if (row) {
            // Update badge
            const badgeClass = action === "approved" ? "bg-success" : "bg-danger";
            row.querySelector("td:nth-child(4)").innerHTML = `<span class="badge ${badgeClass}">${action.charAt(0).toUpperCase() + action.slice(1)}</span>`;
            // Move row to correct table
            const targetTable = action === "approved" ? document.getElementById("approvedTable") : document.getElementById("rejectedTable");
            targetTable.appendChild(row);
          }
          viewModal.hide();
        } else {
          alert("Action failed: " + data.error);
        }
      })
      .catch(err => alert("Request failed: " + err));
    }
  });
});
</script>
<script src="../../scripts/sidebar.js"></script>
<script src="../../scripts/session_check.js"></script>
</body>
</html>