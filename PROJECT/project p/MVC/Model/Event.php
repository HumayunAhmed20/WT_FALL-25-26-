<?php
require_once __DIR__ . '../../Model/db.php';

class Event {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

   
    public function getUpcomingEvents(){
    $today = date('Y-m-d');
        
    $sql = "SELECT * FROM events WHERE date >= ? AND status='Active'";
    
    $stmt = $this->conn->prepare($sql);
    
    $stmt->bind_param("s", $today);
    
    $stmt->execute();
    
    
return $stmt->get_result();

}

    
    public function getUserRegistrations($user_id){
       
    $sql = "SELECT * FROM registrations WHERE user_id=? ORDER BY registration_date DESC";
    
    $stmt = $this->conn->prepare($sql);
    
    $stmt->bind_param("i", $user_id);
    
    $stmt->execute();
    
    
return $stmt->get_result();

}
    
    
}
?>
