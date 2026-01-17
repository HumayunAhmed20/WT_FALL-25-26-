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

<style>


</style>
</head>
<body>
    <div>

<div class="sidebar">

 <img src="\..\..\MVC\Images\445492922_122100097214350632_1896056624552573141_n.jpg." alt="Vol">
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
    <?php if($message): ?>
   
        <div class="alert"><?= htmlspecialchars($message) ?></div>
   
        <?php endif; ?>

    <div class="card">
   
    <h4>Assigned Tasks – Update Progress</h4>
        <table class="table">
   
        <thead>
            <tr>

            <th>#</th>
          <th>Event</th>
   
          <th>Task</th>
   
          <th>Date</th>
   
          <th>Status</th>
   
         <th>Update Progress</th>
         </tr>
   
          </thead>
   
         <tbody>
           
         <?php $i=1; while($row = $tasks->fetch_assoc()): ?>
   
   <?php
   
   $status_class = $row['status']=='Completed' ? 'bg-success' : ($row['status']=='In Progress' ? 'bg-secondary' : 'bg-warning');
   
   $disabled = $row['status']=='Completed' ? 'disabled' : '';
   
   ?>
   
   <tr>
   
   <td><?= $i++ ?></td>
    <td><?= htmlspecialchars($row['event_name']) ?></td>
    <td><?= htmlspecialchars($row['task_name']) ?></td>
   
    <td><?= htmlspecialchars($row['task_date']) ?></td>
    <td><span class="badge <?= $status_class ?>"><?= htmlspecialchars($row['status']) ?></span></td>
     <td>
   
     <form method="POST">
   
     <input type="hidden" name="task_id" value="<?= $row['id'] ?>">
   
     <select name="status" <?= $disabled ?>>
   
     <option value="Pending" <?= $row['status']=='Pending' ? 'selected' : '' ?>>Pending</option>
   
     <option value="In Progress" <?= $row['status']=='In Progress' ? 'selected' : '' ?>>In Progress</option>
   
     <option value="Completed" <?= $row['status']=='Completed' ? 'selected' : '' ?>>Completed</option>
   
    </select>
   
    <button type="submit" name="update_status" <?= $disabled ?>>Update</button>
   
</form>

</td>

</tr>
<?php endwhile; ?>
     
            </tbody>
     
        </table>
    </div>


</body>
</html>
