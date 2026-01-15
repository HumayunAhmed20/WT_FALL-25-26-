<?php
session_start();
$user_id = $_SESSION['user_id'] ?? 1;

require_once __DIR__ . '/../../Controller/EventsController.php';
require_once __DIR__ . '/../../Controller/RegisterController.php';


$eventsController = new EventsController();


$events = $eventsController->getUpcomingEvents();

$registrationController = new RegistrationController();



$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])){

$event_id = $_POST['event_id'];

$event_name = $_POST['event_name'];

$success = $registrationController->registerUser($user_id, $event_id, $event_name);

$message = $success ? "Successfully registered!" : "You are already registered for this event!";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Upcoming Events – AIUB Sports</title>


  <link rel="stylesheet" href="../CSS/up.css">
  <link rel="stylesheet" href="../CSS/userdashboard.css">

</head>
<body>


<div class="sidebar">

<h3>User</h3>
     <a href="UserDashboard.php">Dashboard</a>

     <a href="UpcomingEvents.php">Upcoming Events</a>
     
    <a href="MyProfile.php">My Profile</a>

    <a href="../../Controller/logout.php">Logout</a>
</div>


<div class="topbar">

<h2>Student Dashboard</h2>
    <p>Welcome, User</p>

  </div>


  <div class="top-navbar text-primary p-3 bg-white">
  <div><h3>Student</h3></div>

</div>


<div class="container ">
  <h3>Upcoming Events</h3>


  <?php if($message): ?>
  
    <div class="alert alert-info"><?php echo $message; ?></div>
  <?php endif; ?>


  <div class="row">
  
  <?php while($event = $events->fetch_assoc()): ?>
      <div class="col-md-4">
  
      <div class="card p-3 mb-3 shadow-sm">
          <h5><?php echo htmlspecialchars($event['name']); ?></h5>
  
          <p>Date: <?php echo date('d M Y', strtotime($event['date'])); ?></p>
          <p>Venue: <?php echo htmlspecialchars($event['venue']); ?></p>
  
          <p>Status: <?php echo htmlspecialchars($event['status']); ?></p>

  
          <form method="POST">
              <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
  
            <input type="hidden" name="event_name" value="<?php echo htmlspecialchars($event['name']); ?>">
            <button type="submit" class="btn btn-primary">Register</button>
  
            </form>

  
          </div>
      </div>
  
      <?php endwhile; ?>
  </div>
</div>

</body>
</html>
