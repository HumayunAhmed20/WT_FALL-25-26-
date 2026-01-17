<?php
require_once __DIR__ . '/../../Controller/VolunteerController.php';


$controller = new VolunteerController();

$message = $controller->handleUpdate();

$tasks = $controller->getTasks();

$announcements = $controller->getAnnouncements();

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../../Views/CSS/voldashboard.css">

<title>Update Progress – Volunteer Dashboard</title>
 <link rel="stylesheet" href="../../MVC/Views/CSS/announcement.css">

<style>


</style>
</head>
<body>

    <div>

<div class="sidebar">
    <h3>Volunteer</h3>
  
  <a href="/WT_FALL-25-26-/PROJECT/project%20p/MVC/Views/Volunteer/dashboard.php">Dashboard</a>
  
    <a href="/WT_FALL-25-26-/PROJECT/project%20p/MVC/Controller/RegistrationController.php">Registrations</a>
      
  <a href="/WT_FALL-25-26-/PROJECT/project%20p/MVC/Views/Volunteer/Announcement.php">Announcement</a>
  <a href="/WT_FALL-25-26-/PROJECT/project%20p/MVC/Controller/logout.php">Logout</a>

</div>


<div class="topbar">
     <h5>Volunteer Dashboard Update Progress</h5>

     
      <div>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></div>
</div>


<div class="main-content">
    <h4 class="mb-4 text-primary">📢 Event Announcements</h4>

    <div class="announcement-box">
        <ul class="list-group list-group-flush">
     <?php while($row = $announcements->fetch_assoc()): ?>
    <li class="list-group-item announcement-item">
     <div class="announcement-header">
        <span class="announcement-id">
            #<?= htmlspecialchars($row['id']) ?>
            </span>
           <span class="announcement-date">
               <?= htmlspecialchars($row['event_date']) ?>
                </span>
                    </div>

                   <p class="announcement-message">
                      <?= htmlspecialchars($row['message']) ?>
                    </p>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>



</body>
</html>
