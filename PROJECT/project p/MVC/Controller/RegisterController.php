
<?php


    public function registerUser($user_id, $event_id, $event_name){
      
       
    $stmt = $this->conn->prepare("SELECT * FROM registrations WHERE user_id=? AND event_id=?");
       
    $stmt->bind_param("ii", $user_id, $event_id);

        $stmt->execute();
        $result = $stmt->get_result();

      
        if($result->num_rows > 0){
            return false; 
        }

       
       
     
        $stmt = $this->conn->prepare("INSERT INTO registrations (user_id, event_id, event_name, registration_date) VALUES (?, ?, ?, CURDATE())");
     
        $stmt->bind_param("iis", $user_id, $event_id, $event_name);

        return $stmt->execute();
    }
    
?>
