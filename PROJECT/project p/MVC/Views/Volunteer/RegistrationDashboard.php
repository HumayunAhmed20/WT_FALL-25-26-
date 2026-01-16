
<!DOCTYPE html>
<html lang="en">
<head>
<title>
       Manage Registrations
       </title>
<link rel="stylesheet" href="../Views/CSS/1.css">
<style>

</style>
</head>

<body>


<div class="sidebar">
    <h3>Volunteer</h3>
    <a href="/WT_FALL-25-26-/PROJECT/project%20p/MVC/Views/Volunteer/dashboard.php">Dashboard</a>
    <a href="#">Registrations</a>
  <a href="/WT_FALL-25-26-/PROJECT/project%20p/MVC/Controller/logout.php">Logout</a>
</div>



<div class="top-navbar">
  <h5>Manage Registrations</h5>
  <div style="color:#0d6efd;">
     <div>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></div>
  </div>
</div>


<div class="main-content">

<input type="text" id="searchInput" class="search-input"
       placeholder="Search registration..." onkeyup="searchTable()">

<div class="card">
<table id="registrationTable">
  <thead>
    <tr>
      <th>#</th>
      <th>Student Name</th>
      <th>Email</th>
      <th>Event</th>
      <th>Registration Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
<?php if($registrations && $registrations->num_rows > 0): ?>
<?php while($row = $registrations->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['student_name']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
<td><?= htmlspecialchars($row['event_name']) ?></td>
<td><?= htmlspecialchars($row['registration_date']) ?></td>
<td>
<?php
$status = $row['status'];
$class = match($status){
  'Pending' => 'bg-warning',
  'Approved' => 'bg-success',
  default => 'bg-danger'
};
?>
<span class="badge <?= $class ?>"><?= $status ?></span>
</td>
<td>
        <form method="POST" action="?action=registrationAction">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

<?php if($status === 'Pending'): ?>
<button name="action" value="approve" class="btn btn-success">Approve</button>
<button name="action" value="reject" class="btn btn-danger">Reject</button>

<?php elseif($status === 'Approved'): ?>
<button class="btn btn-secondary" disabled>Approved</button>
<button name="action" value="reject" class="btn btn-danger">Reject</button>

<?php else: ?>
<button name="action" value="approve" class="btn btn-success">Approve</button>
<button class="btn btn-secondary" disabled>Rejected</button>
<?php endif; ?>
</form>
</td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr><td colspan="7">No registrations found</td></tr>
<?php endif; ?>
</tbody>
</table>
</div>

</div>

<script>
function searchTable(){
  const input = document.getElementById("searchInput").value.toLowerCase();
  document.querySelectorAll("#registrationTable tbody tr").forEach(row=>{
    const text = row.innerText.toLowerCase();
    row.style.display = text.includes(input) ? "" : "none";
  });
}
</script>

</body>
</html>
