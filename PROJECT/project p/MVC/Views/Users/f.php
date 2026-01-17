<?php
require_once __DIR__ . '/../../Controller/fcontroller.php';

$message = '';
$showPassword = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
$id = isset($_POST['id']) ? $_POST['id'] : '';

$username = isset($_POST['username']) ? $_POST['username'] : '';

$email = isset($_POST['email']) ? $_POST['email'] : '';

$password = isset($_POST['password']) ? $_POST['password'] : '';

    $controller = new fController($id);
    $user = $controller->getProfile();


    if (
        $user &&
       
        isset($user['username'], $user['email']) &&
       
        $user['username'] === $username &&
       
        $user['email'] === $email &&
       
        empty($password)
    ) {
        $showPassword = true;
       
        $message = "Verified! Now enter new password.";
    }


    elseif (!empty($password)) {
        
    $success = $controller->updateProfile(['password' => $password]);
        $message = $success
            ? "Password updated successfully!"
            : "Failed to update password.";
    }

    else {
        $message = "ID, Username or Email not matched!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forget Password</title>
    <link rel="stylesheet" href="../CSS/myprofile.css">
</head>
<body>

<div class="main-content">
    <div class="card">
        <h4>Forget Password</h4>

        <?php if($message): ?>
            <p style="color:green;"><?php echo $message; ?></p>
        <?php endif; ?>

       <form method="POST">

    <label>ID</label>
    <input type="text" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>" required>
    <br>

    <label>Username</label>
    <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>

    <?php if($showPassword): ?>
        <label>New Password</label>
        <input type="password" name="password" required>
    <?php endif; ?>

    <button type="submit">
        <?php echo $showPassword ? 'Update Password' : 'Verify'; ?>
    </button>
      <a href="/WT_FALL-25-26-/PROJECT/project%20p/MVC/Views/login.php">Login Page</a>
</form>

        
    </div>
</div>

</body>
</html>
