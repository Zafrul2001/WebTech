<?php
 
class mydb{
 
    function openCon(){
        $dbhost="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="seci";
        $connobject=new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
 
        if ($connobject->connect_error) {
            die("Connection failed: " . $connobject->connect_error);
        }
 
        return $connobject;
    }
 
    function addWorker($table, $username, $full_name, $gender, $email, $phone, $profession, $password, $address, $picture, $document, $connobject){
        $sql = "INSERT INTO $table (username, full_name, gender, email, phone, profession, password, address, picture, document) 
        VALUES ('$username', '$full_name', '$gender', '$email', '$phone', '$profession', '$password', '$address', '$picture', '$document')";
        return $connobject->query($sql);
    }
 
 
    function showAllWorkers($table, $connobject){
        $sql = "SELECT * FROM $table";
        $result = $connobject->query($sql);
        return $result;
    }
 
    function searchWorkerByID($table, $connobject, $id){
        $sql = "SELECT * FROM $table WHERE id='$id'";
        $result = $connobject->query($sql);
        return $result;
    }
 
    function closeCon($connobject){
        $connobject->close();
    }
}
 
?>

