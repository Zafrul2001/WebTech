<?php
// db_connection.php

class mydb {
    private $conn;
    
    // Database connection details
    private $host = 'localhost';
    private $db = 'home_service_management_system';
    private $user = 'himel';
    private $pass = 'faishal127';

    // Connect to the database
    public function openCon() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    // Close the database connection
    public function closeCon() {
        $this->conn->close();
    }

    // Get workers by profession using a prepared statement to avoid SQL injection
    public function showWorkersByProfession($table, $profession, $connobject) {
        $stmt = $connobject->prepare("SELECT * FROM $table WHERE profession = ?");
        $stmt->bind_param("s", $profession); // "s" means the profession is a string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}
?>
