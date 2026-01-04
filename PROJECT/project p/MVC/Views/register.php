<?php
// ================= DATABASE CONNECTION =================
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "humayun";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ================= VARIABLES =================
$success = $error = "";
$username = $email = "";

// ================= FORM SUBMIT =================
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $email    = trim($_POST["email"]);

    // ================= VALIDATION =================
    if (empty($username)) {
        $error = "Username required";
    } elseif (strlen($username) < 3) {
        $error = "Username must be at least 3 characters";
    } elseif (empty($password)) {
        $error = "Password required";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters";
    } elseif (empty($email)) {
        $error = "Email required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {

        // ================= DUPLICATE EMAIL CHECK =================
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Email already exists";
        } else {

            // ================= INSERT DATA =================
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare(
                "INSERT INTO users (username, password, email) VALUES (?, ?, ?)"
            );
            $stmt->bind_param("sss", $username, $hashPassword, $email);

            if ($stmt->execute()) {
                $success = "Registration complete";
                $username = $email = "";
            } else {
                $error = "Registration failed";
            }
            $stmt->close();
        }
        $check->close();
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
 
<style>
*{box-sizing:border-box;font-family:Arial,Helvetica,sans-serif}
body{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:#f4f6f9
}
.card{
width:100%;
max-width:420px;
background:#fff;
padding:30px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.2)
}
h3{
text-align:center;
color:#0d6efd;
margin-bottom:25px
}
label{font-weight:bold}
input{
width:100%;
padding:12px;
margin-bottom:15px;
border-radius:12px;
border:1px solid #ccc
}
button{
width:100%;
padding:12px;
background:#0d6efd;
color:#fff;
border:0;
border-radius:12px
}
</style>
</head>
 <body>
<div class="card">
<h3>Create Account</h3>
 
<form method="POST">
 
<label>Username</label>
<input type="text" name="username" placeholder="Enter username">

 
<label>Email</label>
<input type="email" name="email" placeholder="Enter email">
 
<label>Password</label>
<input type="password" name="password" placeholder="Enter password">
 
<label>Role</label>
<input type="text" name="role" value="user">
 
<button type="submit">Register</button>
</form>
 
<div class="login-text">
Already have an account? <a href="">Login</a>
</div>
</div>
</body>
</html>