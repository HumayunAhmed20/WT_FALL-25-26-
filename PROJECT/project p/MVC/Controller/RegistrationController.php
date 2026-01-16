<?php
session_start();
   

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'volunteer') {
  
header('Location: /WT_FALL-25-26-/PROJECT/project p/MVC/Views/login.php');

exit;
}


require_once __DIR__ . '../../Model/RegistrationModel.php';

require_once __DIR__ . '../../Model/db.php';

$db   = new DataBase();

$conn = $db->connect();
 
