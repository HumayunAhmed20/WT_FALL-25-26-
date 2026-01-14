

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../CSS/myprofile.css">

  <link rel="stylesheet" href="/project p/MVC/Views/CSS/userdashboard.css">

  <title>Profile - AIUB Sports</title>
</head>
<body>

<div class="sidebar">
    <h4>User</h4>
     <a href="/project p/MVC/Views/Users/UserDashboard.php">Dashboard</a>

    <a href="/project p/MVC/Views/Users/UpcomingEvents.php">Upcoming Events</a>

    <a href="/project p/MVC/Views/Users/MyProfile.php">My Profile</a>

         <a href="/project p/MVC/Controller/logout.php">Logout</a>
</div>

<div class="top-navbar">
    <h2>Profile</h2>

    <div>Welcome, User</div>
</div>

<div class="main-content">
    <div class="card">
      

      <h4 style="margin-bottom: 1.5rem;">My Profile</h4>

      <?php if($message): ?>

        <p style="color:green;"><?php echo $message; ?></p>

      <?php endif; ?>

      <form method="POST" action="">
        <label class="form-label" for="name">Full Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['username']); ?>" required>

        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <label class="form-label" for="role">Role</label>
        <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($user['role']); ?>" readonly>

        <label class="form-label" for="password">Change Password</label>
        <input type="password" id="password" name="password" placeholder="Enter new password">

        <button type="submit" class="btn-custom">Update Profile</button>
      </form>
    </div>
</div>

</body>
</html>
