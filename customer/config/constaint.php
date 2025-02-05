<?php

session_start(); 


if (!isset($_SESSION['username'])) {
  
    header("Location: login.php");
    exit();
}
class mydb {
    
    private $host = "localhost";      
    private $username = "himel";       
    private $password = "faishal127";           
    private $dbname = "home_service_management_system";
    
    
    public function openCon() {
       
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn;
    }
    
    
    public function closeCon($conn) {
        $conn->close();
    }
}
?>
