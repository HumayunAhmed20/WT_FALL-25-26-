<?php
require_once __DIR__ . '/../../Controller/VolunteerController.php';


$controller = new VolunteerController();

$message = $controller->handleUpdate();

$tasks = $controller->getTasks();

$announcements = $controller->getAnnouncements();

?>
