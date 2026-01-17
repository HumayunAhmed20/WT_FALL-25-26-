<?php
require_once __DIR__ . '/../Model/f.php';
require_once __DIR__ . '/../Model/db.php';

class fController {

    private $userModel;
    private $user_id;

    public function __construct($user_id){
        $db = new DataBase();
        $conn = $db->connect();
        $this->userModel = new f($conn);
        $this->user_id = $user_id;
    }

    public function getProfile(){
        return $this->userModel->getUserById($this->user_id);
    }

    public function updateProfile($data){
        if(empty($data['password'])) return false;
        return $this->userModel->updatePassword($this->user_id, $data['password']);
    }
}
