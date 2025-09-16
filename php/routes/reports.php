<?php
include_once "../utils/db.php";
include_once "../partials/sidebar.php";

$visitorCounts = $pdo->query("SELECT status, COUNT(*) as total FROM visitors GROUP BY status")->fetchAll();
$vehicleCounts = $pdo->query("SELECT status, COUNT(*) as total FROM vehicles GROUP BY status")->fetchAll();

function getStatusCount($data, $status) {
    foreach($data as $d){ if($d['status']==$status) return $d['total']; }
    return 0;
}

$visitorPending = getStatusCount($visitorCounts,'pending');
$visitorApproved = getStatusCount($visitorCounts,'approved');
$visitorDenied = getStatusCount($visitorCounts,'denied');

$vehiclePending = getStatusCount($vehicleCounts,'pending');
$vehicleApproved = getStatusCount($vehicleCounts,'approved');
$vehicleDenied = getStatusCount($vehicleCounts,'denied');
?>

<h2>Reports & Analytics</h2>
<canvas id="visitorChart" width="400" height="200"></canvas>
<canvas id="vehicleChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const visitorChart = new Chart(document.getElementById('visitorChart'), {
    type: 'doughnut',
    data: {
        labels:['Pending','Approved','Denied'],
        datasets:[{data:[<?= $visitorPending ?>,<?= $visitorApproved ?>,<?= $visitorDenied ?>],backgroundColor:['#f0ad4e','#5cb85c','#d9534f']}]
    }
});
const vehicleChart = new Chart(document.getElementById('vehicleChart'), {
    type: 'doughnut',
    data: {
        labels:['Pending','Approved','Denied'],
        datasets:[{data:[<?= $vehiclePending ?>,<?= $vehicleApproved ?>,<?= $vehicleDenied ?>],backgroundColor:['#f0ad4e','#5cb85c','#d9534f']}]
    }
});
</script>
