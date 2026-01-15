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




    public function getUserById($user_id){
        $stmt = $this->conn->prepare("SELECT id, username, email, role FROM users WHERE id=?");
        $stmt->bind_param("i", $user_id);

        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function updateProfile($user_id, $username, $email, $password = null){
        if($password){
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("UPDATE users SET username=?, email=?, password=? WHERE id=?");
            $stmt->bind_param("sssi", $username, $email, $hashed, $user_id);

        } else {
            $stmt = $this->conn->prepare("UPDATE users SET username=?, email=? WHERE id=?");

            $stmt->bind_param("ssi", $username, $email, $user_id);

        }

        return $stmt->execute();
    }

?>
