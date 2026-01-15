<?php
require_once __DIR__ . '../../Model/Event.php';
;
require_once __DIR__ . '../../Model/db.php';

class EventsController {
    private $eventModel;

    public function __construct(){
        $db = new DataBase();
        $conn = $db->connect();
        $this->eventModel = new Event($conn);
    }

    public function getUpcomingEvents(){
        return $this->eventModel->getUpcomingEvents();
    }
}
?>
