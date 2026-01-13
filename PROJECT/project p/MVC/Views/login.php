<?php
require_once "../../MVC/Controller/AuthController.php";


$auth = new AuthController();
$error =$auth ->handleLogin();
?>




