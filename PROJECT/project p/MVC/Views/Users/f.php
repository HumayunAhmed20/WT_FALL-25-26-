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


