<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Personal Info</title>
<style>
body { font-family: Arial; text-align: center; margin-top: 30px; }
#sidebar-container { width: 220px; }
.info-box { display: inline-block; text-align: left; border: 2px solid #333; border-radius: 10px; 
            padding: 20px; background-color: #f9f9f9; margin-bottom:20px; }
.info-box img { max-width: 150px; border-radius: 10px; margin-bottom: 10px; }
h2 { text-align: center; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; }
th, td { border: 1px solid #333; padding: 5px; text-align: left; }
</style>
</head>
<body>
<div id="sidebar-container"></div>

<h1>Visitor / Personnel Info</h1>

<div class="info-box">
    <h3>Visitor Info</h3>
    <img id="visitor-selfie" src="/public/default_face.jpg" alt="Visitor Selfie">
    <p><strong>Name:</strong> <span id="visitor-name">Loading...</span></p>
    <p><strong>Age:</strong> <span id="visitor-age">Loading...</span></p>
    <p><strong>Gender:</strong> <span id="visitor-gender">Loading...</span></p>
    <p><strong>Contact:</strong> <span id="visitor-contact">Loading...</span></p>
    <p><strong>Address:</strong> <span id="visitor-address">Loading...</span></p>
    <p><strong>ID/Pass Number:</strong> <span id="visitor-id">Loading...</span></p>
    <p><strong>Affiliation/Company:</strong> <span id="visitor-affiliation">Loading...</span></p>
    <p><strong>Purpose of Visit:</strong> <span id="visitor-purpose">Loading...</span></p>
    <p><strong>Access Level:</strong> <span id="visitor-access">Loading...</span></p>
</div>

<div class="info-box">
    <h3>Entry History</h3>
    <table>
        <thead>
            <tr>
                <th>Last Visit</th><th>Entries</th><th>Access</th><th>Vehicle</th><th>Incidents</th>
            </tr>
        </thead>
        <tbody id="entry-history">
        </tbody>
    </table>
</div>

<script>
fetch('/static/partials/sidebar.html').then(r => r.text()).then(html => document.getElementById('sidebar-container').innerHTML = html);

async function loadVisitorInfo() {
    const visitorName = localStorage.getItem('recognizedVisitorName');
    if(!visitorName) { alert("No recognized visitor"); return; }

    try {
        const res = await fetch(`/admin/cameras/visitor_info?visitor_name=${visitorName}`);
        const data = await res.json();

        // Visitor Info
        document.getElementById('visitor-selfie').src = data.selfie || '/public/default_face.jpg';
        document.getElementById('visitor-name').textContent = data.name || "-";
        document.getElementById('visitor-age').textContent = data.age || "-";
        document.getElementById('visitor-gender').textContent = data.gender || "-";
        document.getElementById('visitor-contact').textContent = data.contact || "-";
        document.getElementById('visitor-address').textContent = data.address || "-";
        document.getElementById('visitor-id').textContent = data.id_pass || "-";
        document.getElementById('visitor-affiliation').textContent = data.affiliation || "-";
        document.getElementById('visitor-purpose').textContent = data.purpose || "-";
        document.getElementById('visitor-access').textContent = data.access_level || "-";

        // Entry History
        const tbody = document.getElementById('entry-history');
        tbody.innerHTML = "";
        if(data.history) {
            data.history.forEach(h => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${h.last_visit || "-"}</td>
                    <td>${h.entries || "-"}</td>
                    <td>${h.access || "-"}</td>
                    <td>${h.vehicle || "-"}</td>
                    <td>${h.incidents || "-"}</td>
                `;
                tbody.appendChild(tr);
            });
        }

    } catch(err) {
        console.error(err);
        alert("Failed to load visitor info");
    }
}

loadVisitorInfo();
</script>
</body>
</html>