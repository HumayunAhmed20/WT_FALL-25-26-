
<?php

require_once __DIR__ . "/../../MVC/Model/db.php";


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

      if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
            return "Name must contain only letters and spaces!";
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];          
        $confirm_password = $_POST['confirm_password'];
        $role = $_POST['role'];
     
       
        $pattern = "/^\d{2}-\d{5}-\d@student\.aiub\.edu$/";
        if (!preg_match($pattern, $email)) {
            return "Invalid email format! Use: xx-xxxxx-x@student.aiub.edu";
        }

        
        if ($password !== $confirm_password) {
            return "Password and Confirm Password do not match!";
        }

      
        $stmt = $this->conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        

        return "Email already registered!";
        }

           $hashed_password = password_hash($password, PASSWORD_DEFAULT);

       
       
           $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

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
