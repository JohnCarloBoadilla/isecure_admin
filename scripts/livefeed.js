const video = document.getElementById("camera");
const resultDiv = document.getElementById("result");

// Access camera
navigator.mediaDevices.getUserMedia({ video: true })
  .then(stream => { video.srcObject = stream; })
  .catch(err => { 
    resultDiv.innerText = "Camera access denied"; 
    console.error(err); 
  });

// Capture and send frame
async function captureAndSend() {
  const canvas = document.createElement("canvas");
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);

  canvas.toBlob(async blob => {
    const fd = new FormData();
    fd.append("image", blob, "capture.jpg");
    fd.append("mode", mode);

    try {
      const res = await fetch("process_recognition.php", { method: "POST", body: fd });
      const data = await res.json();
      resultDiv.innerText = JSON.stringify(data, null, 2);

      if(data.recognized){
          window.location.href = `personalinformation.php?id=${data.id}&type=${data.type}`;
      }
    } catch(err) {
      resultDiv.innerText = "Recognition failed: " + err.message;
    }
  }, "image/jpeg");
}

// Capture every 3 seconds
setInterval(captureAndSend, 3000);


/* ---- Logout modal ---- */
document.addEventListener("DOMContentLoaded", () => {
  const logoutLink = document.getElementById("logout-link");
  if (logoutLink) {
    logoutLink.addEventListener("click", (ev) => {
      ev.preventDefault();
      const modal = document.getElementById("confirmModal");
      const msgEl = document.getElementById("confirmMessage");
      const yes = document.getElementById("confirmYes");
      const no = document.getElementById("confirmNo");

      msgEl.textContent = "Are you sure you want to log out?";
      modal.classList.add("show");

      yes.onclick = () => { window.location.href = logoutLink.href; };
      no.onclick = () => { modal.classList.remove("show"); };
    });
  }
});
