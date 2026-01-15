<?php
require_once __DIR__ . '../../Model/User.php';

require_once __DIR__ . '../../Model/Db.php';

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

}
?>
