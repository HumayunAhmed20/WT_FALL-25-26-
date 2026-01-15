<?php

    public function register($username, $email, $password, $role = 'user'){
       
    $stmt = $this->conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
     
    $stmt->bind_param("ss", $username, $email);
    
    $stmt->execute();
        $stmt->store_result();

    
        if($stmt->num_rows > 0){
            return "Username or Email already exists!";
        }
    
        $stmt->close();

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $this->conn->prepare("INSERT INTO users (username,email,password,role) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);


    if($stmt->execute()){

    return true;

    } else {

    return "Error: " . $this->conn->error;
        }
    }




   
?>
