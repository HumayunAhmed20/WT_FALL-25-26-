<!DOCTYPE html>
<html lang="en">
<head>

  <title>Profile - AIUB Sports</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f9;
      margin: 0;
    }
 
  
    .sidebar {
      height: 100vh;
      width: 220px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #0d6efd;
      padding-top: 2rem;
      color: #fff;
    }
    .sidebar a {
      display: block;
      color: #fff;
      padding: 12px 20px;
      text-decoration: none;
      margin-bottom: 0.5rem;
      border-radius: 8px;
      transition: 0.2s;
    }
    .sidebar a:hover {
      background-color: #084298;
    }
    .sidebar h4 {
      text-align: center;
      margin-bottom: 2rem;
      color: #ffd369;
    }
 
   
    .top-navbar {
      background-color: #fff;
      padding: 1rem 2rem;
      margin-left: 220px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .top-navbar h5 {
      margin: 0;
      color: #0d6efd;
    }
 
   
    .main-content {
      margin-left: 220px;
      padding: 2rem;
    }
 
    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 2rem;
      margin-bottom: 2rem;
    }
 
    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }
 
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 1rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      font-size: 1rem;
    }
 
    button.btn-custom {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(45deg, #0d6efd);
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }
 
   
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