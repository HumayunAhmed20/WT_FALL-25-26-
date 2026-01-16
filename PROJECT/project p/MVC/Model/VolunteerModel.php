<?php
require_once "DB.php";

class VolunteerModel {
    private $conn;

    public function __construct() {
        $db = new DataBase();
        $this->conn = $db->connect(); 
    }

    public function getTasks($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM volunteer_tasks WHERE volunteer_id=? ORDER BY task_date ASC");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }

   
}
