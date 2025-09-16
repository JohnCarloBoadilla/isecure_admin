<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Camera Live Feed</title>
<style>
body { font-family: Arial; text-align: center; margin-top: 20px; }
video { border: 2px solid #333; border-radius: 10px; }
#result { margin-top: 20px; font-weight: bold; }
</style>
</head>
<body>
<div id="sidebar-container"></div>
<h2>Camera Live Feed</h2>
<video id="camera" width="640" height="480" autoplay></video>
<div id="result">Waiting for detection...</div>

<script>
fetch('/static/partials/sidebar.html').then(r => r.text()).then(html => document.getElementById('sidebar-container').innerHTML = html);

const params = new URLSearchParams(window.location.search);
const mode = params.get('mode'); // face, vehicle, ocr

const video = document.getElementById("camera");
const resultDiv = document.getElementById("result");

navigator.mediaDevices.getUserMedia({ video: true })
.then(stream => { video.srcObject = stream; })
.catch(err => { resultDiv.innerText = "Camera access denied"; console.error(err); });

async function captureAndSend() {
    const canvas = document.createElement("canvas");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    canvas.toBlob(async blob => {
        const fd = new FormData();
        fd.append("file", blob, "capture.jpg");

        let url = "";
        if(mode === "face") url = "http://localhost:8000/recognize/face";
        else if(mode === "vehicle") url = "http://localhost:8000/recognize/vehicle";
        else if(mode === "ocr") url = "http://localhost:8000/ocr/id";

        try {
            const res = await fetch(url, { method: "POST", body: fd });
            const data = await res.json();
            resultDiv.innerText = JSON.stringify(data, null, 2);
            if(mode === "face") localStorage.setItem('recognizedVisitorName', data.name);
        } catch(err) {
            resultDiv.innerText = "Recognition failed: " + err.message;
        }
    }, "image/jpeg");
}

// Capture every 3 seconds for detection
setInterval(captureAndSend, 3000);
</script>
</body>
</html>