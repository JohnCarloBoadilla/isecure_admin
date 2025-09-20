fetch('partials/sidebar.php')
  .then(r => {
    if (!r.ok) throw new Error("Sidebar not found: " + r.status);
    return r.text();
  })
  .then(html => document.getElementById('sidebar-container').innerHTML = html)
  .catch(err => console.error(err));
