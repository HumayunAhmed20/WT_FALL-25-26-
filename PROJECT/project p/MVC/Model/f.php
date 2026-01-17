<?php
class f {

    private $conn;
    private $table = "users";

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getUserById($id){
        $sql = "SELECT id, username, email FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updatePassword($id, $password){
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE {$this->table} SET password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$hashed, $id]);
    }
}
