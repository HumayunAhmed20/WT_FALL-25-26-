<?php
require_once __DIR__ . '../../Model/Event.php';
require_once __DIR__ . '../../Model/db.php';

class UserDashboardController {
    private $eventModel;
    private $user_id;

    public function __construct($user_id){
        $db = new DataBase();

        
        $conn = $db->connect();
        
        $this->eventModel = new Event($conn);
        
        $this->user_id = $user_id;
    }

    public function getDashboardData(){
        
    $events = $this->eventModel->getUpcomingEvents();
    
    $registrations = $this->eventModel->getUserRegistrations($this->user_id);

        return [
            
        'events' => $events,
    

            'registrations' => $registrations
        ];
    }
}
?>
