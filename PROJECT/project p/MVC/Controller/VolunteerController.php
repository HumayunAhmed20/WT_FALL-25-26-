<?php
session_start();


require_once __DIR__ . '../../Model/Db.php';
require_once __DIR__ . '../../Model/VolunteerModel.php'; 

class VolunteerController {
   
private $model;

private $user_id;


    public function __construct() {

    $this->model = new VolunteerModel();

    
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'volunteer') {
            
            header('Location:/WT_FALL-25-26-/PROJECT/project%20p/MVC/Views/login.php');
            exit;
        }

        $this->user_id = $_SESSION['user_id'];
    }

  
   

    public function getTasks() {
        return $this->model->getTasks($this->user_id);
    }

    public function getAnnouncements() {
        return $this->model->getAnnouncements();
    }
}
