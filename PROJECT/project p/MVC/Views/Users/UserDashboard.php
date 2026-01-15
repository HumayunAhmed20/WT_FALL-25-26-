<?php

session_start();


$user_id = $_SESSION['user_id'] ?? 1; 

require_once __DIR__ . '/../../Controller/UserDashboardController.php';
$controller = new UserDashboardController($user_id);
$data = $controller->getDashboardData();
$events = $data['events'];
$registrations = $data['registrations'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <link rel="stylesheet" href="../../Views/CSS/userdashboard.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>

<div class="sidebar">
    <h3>User</h3>
    <a href="UserDashboard.php">Dashboard</a>
    <a href="UpcomingEvents.php">Upcoming Events</a>
    <a href="MyProfile.php">My Profile</a>
   <a href="logout.php">Logout</a>
</div>

<div class="topbar">
    <h2>Student Dashboard</h2>
    <p>Welcome, User</p>
</div>

<div class="main">

    <div class="alert">Welcome to the Sports Event Dashboard</div>


    
    <div class="card">

        <h4>My Participation History</h4>
        <table>
            <tr>
                <th>#</th>

                
            <th>Event</th>
            
            <th>Team / Players</th>
                <th>Date</th>
            
                <th>Status</th>
            </tr>
            
            <?php $count=1; while($reg = $registrations->fetch_assoc()): ?>
            <tr>
            
            <td><?php echo $count++; ?></td>
                <td><?php echo htmlspecialchars($reg['event_name']); ?></td>
            
                <td>
                    <?php
            
            
            
            
            echo "Individual";
            
            
            ?>
                </td>
            
                <td><?php echo date('d M Y', strtotime($reg['registration_date'])); ?></td>
                <td><?php echo htmlspecialchars($reg['status']); ?></td>
            
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    

</div>

</body>
</html>
