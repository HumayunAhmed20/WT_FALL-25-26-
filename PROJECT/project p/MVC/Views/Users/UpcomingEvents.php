<?php
session_start();
$user_id = $_SESSION['user_id'] ?? 1;

require_once __DIR__ . '/../../Controller/EventsController.php';
require_once __DIR__ . '/../../Controller/RegisterController.php';


$eventsController = new EventsController();


$events = $eventsController->getUpcomingEvents();

$registrationController = new RegistrationController();



$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])){

$event_id = $_POST['event_id'];

$event_name = $_POST['event_name'];

$success = $registrationController->registerUser($user_id, $event_id, $event_name);

$message = $success ? "Successfully registered!" : "You are already registered for this event!";

}

?>


</body>
</html>
