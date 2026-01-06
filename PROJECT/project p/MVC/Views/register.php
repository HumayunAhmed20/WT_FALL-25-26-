
<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "humayun";




$success = $error = "";
$username = $email = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $email    = trim($_POST["email"]);


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

        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Email already exists";
        } else {

            
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
<link rel="stylesheet" href="../Views/CSS/register.css">
<title>Register</title>
 
<style>

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
