<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../../Views/CSS/myprofile.css">
  <title>Profile - AIUB Sports</title>
  <style>
 
   
  </style>
</head>
<body>
 
  
  <div class="sidebar">
    <h4>User</h4>
    <a href="">Dashboard</a>
    <a href="">Upcoming Events</a>
    <a href="">My Registrations</a>
    <a href="#">Profile</a>
    <a href="#">Logout</a>
  </div>
 
 
  <div class="top-navbar">
    <h5>Profile</h5>
    <div>Welcome, John Doe</div>
  </div>
 
 
  <div class="main-content">
    <div class="card">
      <h4 style="margin-bottom: 1.5rem;">My Profile</h4>
      <form method="POST" action="">
        <label class="form-label" for="name">Full Name</label>
        <input type="text" id="name" name="name" value="John Doe" required>
 
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" value="john@example.com" required>
 
        <label class="form-label" for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="+880 123456789" required>
 
        <label class="form-label" for="role">Role</label>
        <input type="text" id="role" name="role" value="Student" readonly>
 
        <label class="form-label" for="password">Change Password</label>
        <input type="password" id="password" name="password" placeholder="Enter new password">
 
        <button type="submit" class="btn-custom">Update Profile</button>
      </form>
    </div>
  </div>
 
 
</body>
</html>