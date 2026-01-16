<?php
require_once "../../MVC/Model/db.php";
require_once "../../MVC/Controller/RegisterController.php";
require_once "../../MVC/Controller/AuthController.php";
$db = new DataBase();
$conn = $db->connect();

$controller = new RegistrationController(); 
$message = $controller->handleRegister();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/register.css">
<title>Register</title>


</head>
<body>
<div class="card">
    <h3>Create Account</h3>

    <?php if(isset($message)) : ?>
        <p style="color:red;">
            <?php echo $message === true ? "Registration successful!" : $message; ?>
        </p>
    <?php endif; ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter username" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter email" required>

        <div class="password-wrapper">
           
        <label>Password</label>
        
        <input type="password" name="password" id="password" placeholder="Enter password" required>
        
        <span class="toggle-icon" onclick="togglePassword('password')">👁️</span>
        </div>

        <div class="password-wrapper">
        
        <label>Confirm Password</label>
        
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
        
        <span class="toggle-icon" onclick="togglePassword('confirm_password')">👁️</span>
        </div>

        <label>Role</label>
        <input type="text" name="role" value="user" readonly>

        <button type="submit" name="submit">Register</button>
    </form>

    <div class="login-text">
        Already have an account? <a href="login.php">Login</a>
    </div>
</div>

<script>
function togglePassword(id) {
    const field = document.getElementById(id);
    if (field.type === "password") {
        field.type = "text";
    } else {
        field.type = "password";
    }
}
</script>
</body>
</html>