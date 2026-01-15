
<?php
require_once __DIR__ . '../../Model/db.php';

class RegistrationController {
    public $conn;


    public function __construct(){
        $db = new DataBase();

        $this->conn = $db->connect();
    }

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
     public function handleRegister() {
    if (isset($_POST['submit'])) {
       
        $username = trim($_POST['username']);
        $email    = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role     = $_POST['role'];
 
      
        $stmt = $this->conn->prepare("SELECT email FROM users WHERE email = ?");
       
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $result = $stmt->get_result();
 
        if ($result->num_rows > 0) {

            return "Email already registered!"; 
        }
 

        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $role);
       
        if ($stmt->execute()) {
          
        
            header("Location: login.php?status=success");
            exit();
        } else {

            return "Error: " . $this->conn->error;
        }
    }
   }
}
?>
