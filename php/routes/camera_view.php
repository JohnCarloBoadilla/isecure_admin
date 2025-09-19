<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Camera Feature Selection</title>
<style>
body { font-family: Arial; display: flex; flex-direction: column; align-items: center; margin-top: 50px; }
h1 { margin-bottom: 40px; }
.features { display: flex; gap: 30px; }
.feature-box {
    width: 200px; height: 200px; border: 2px solid #333; border-radius: 15px;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    cursor: pointer; transition: 0.3s; background-color: #f0f0f0; font-weight: bold;
}
.feature-box:hover { background-color: #ddd; transform: scale(1.05); }
.feature-box img { width: 80px; height: 80px; margin-bottom: 10px; }
</style>
</head>
<body>

<div id="sidebar-container"></div>
<h1>Select Camera Feature</h1>
<div class="features">
    <div class="feature-box" onclick="goToFeature('face')">
        <img src="/public/icons/face.png" alt="Facial Recognition">Facial Recognition
    </div>
    <div class="feature-box" onclick="goToFeature('vehicle')">
        <img src="/public/icons/vehicle.png" alt="Vehicle Recognition">Vehicle Recognition
    </div>
    <div class="feature-box" onclick="goToFeature('ocr')">
        <img src="/public/icons/id.png" alt="OCR ID">OCR ID
    </div>
</div>

<script>
fetch('partials/sidebar.php')
.then(res => res.text())
.then(html => document.getElementById('sidebar-container').innerHTML = html);

function goToFeature(feature) {
    window.location.href = `camera_livefeed.php?mode=${feature}`;
}
</script>
</body>
</html>
