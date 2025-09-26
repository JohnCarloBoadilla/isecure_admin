document.addEventListener("DOMContentLoaded", () => {

  /* ---- Logout Modal ---- */
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

  /* ---- Widget Minimize & Remove ---- */
  document.querySelectorAll(".widget-card").forEach(widget => {
    const minimizeBtn = widget.querySelector(".minimize-btn");
    const removeBtn = widget.querySelector(".remove-btn");

    if (minimizeBtn) {
      minimizeBtn.addEventListener("click", () => widget.classList.toggle("minimized"));
    }
    if (removeBtn) {
      removeBtn.addEventListener("click", () => widget.style.display = "none");
    }
  });

  /* ---- Sidebar Smooth Scroll ---- */
  document.querySelectorAll(".nav-links a[href^='#']").forEach(link => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const targetId = link.getAttribute("href").substring(1);
      const target = document.getElementById(targetId);
      if (target) {
        target.style.display = "block"; // restore hidden if any
        target.classList.remove("minimized");
        target.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  });

  /* ---- Load Latest Vehicles ---- */
  window.loadLatestVehicles = () => {
    const latestVehicleList = document.querySelector("#latest-vehicle-widget .list-group");
    if (latestVehicleList) {
      fetch("fetch_latest_vehicles.php")
        .then(res => res.json())
        .then(data => {
          latestVehicleList.innerHTML = "";
          if (data.length > 0) {
            data.forEach(v => {
              const li = document.createElement("li");
              li.className = "list-group-item";
              li.textContent = `${v.vehicle_brand} ${v.vehicle_model} - ${v.vehicle_owner}`;
              latestVehicleList.appendChild(li);
            });
          } else {
            latestVehicleList.innerHTML = "<li class='list-group-item'>No recent vehicles</li>";
          }
        })
        .catch(err => {
          console.error("Error loading latest vehicles:", err);
          latestVehicleList.innerHTML = "<li class='list-group-item'>Error loading data</li>";
        });
    }
  };

  /* ---- Load Visitor Status ---- */
  window.loadVisitorStatus = () => {
    const tableBody = document.querySelector("#visitor-status-widget tbody");
    if (tableBody) {
      fetch("fetch_visitor_status.php")
        .then(res => res.json())
        .then(data => {
          tableBody.innerHTML = "";
          if (data.length > 0) {
            data.forEach(v => {
              const row = document.createElement("tr");
              row.innerHTML = `
                <td>${v.full_name}</td>
                <td>${v.time_in || ''}</td>
                <td>${v.time_out || ''}</td>
                <td>${v.date}</td>
                <td>${v.status}</td>
              `;
              tableBody.appendChild(row);
            });
          } else {
            tableBody.innerHTML = "<tr><td colspan='5'>No visitors found</td></tr>";
          }
        })
        .catch(err => {
          console.error("Error loading visitor status:", err);
          tableBody.innerHTML = "<tr><td colspan='5'>Error loading data</td></tr>";
        });
    }
  };

  /* ---- Load User Activity ---- */
  window.loadUserActivity = () => {
    const ul = document.querySelector("#user-activity-widget .list-group");
    if (ul) {
      fetch("fetch_user_activity.php")
        .then(res => res.json())
        .then(data => {
          ul.innerHTML = "";
          if (data.length > 0) {
            data.forEach(a => {
              const li = document.createElement("li");
              li.className = "list-group-item";
              li.textContent = `${a.user_id} - ${a.action} (${a.created_at})`;
              ul.appendChild(li);
            });
          } else {
            ul.innerHTML = "<li class='list-group-item'>No activity found</li>";
          }
        })
        .catch(err => {
          console.error("Error loading user activity:", err);
          ul.innerHTML = "<li class='list-group-item'>Error loading data</li>";
        });
    }
  };

  /* ---- Initial Load ---- */
  loadLatestVehicles();
  loadVisitorStatus();
  loadUserActivity();

  /* ---- Auto Refresh every 30s ---- */
  setInterval(() => {
    loadLatestVehicles();
    loadVisitorStatus();
    loadUserActivity();
  }, 30000);

});
