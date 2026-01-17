<?php
require_once __DIR__ . '../../Model/User.php';

require_once __DIR__ . '../../Model/db.php';

class ProfileController {
    private $userModel;
    private $user_id;

    public function __construct($user_id){
        $db = new DataBase();
        $conn = $db->connect();
        $this->userModel = new User($conn);
        $this->user_id = $user_id;
    }

    public function getProfile(){
        return $this->userModel->getUserById($this->user_id);
    }

    public function updateProfile($data){
        $username = trim($data['name']);
        $email = trim($data['email']);
        $password = !empty($data['password']) ? trim($data['password']) : null;

        return $this->userModel->updateProfile($this->user_id, $username, $email, $password);
    }
}
?>
