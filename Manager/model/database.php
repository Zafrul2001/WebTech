<?php
 
class mydb{
 
    function openCon(){
        $dbhost="localhost";
        $dbusername="";
        $dbpassword="";
        $dbname="home_service_management_system";
        $connobject=new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
 
        if ($connobject->connect_error) {
            die("Connection failed: " . $connobject->connect_error);
        }
 
        return $connobject;
    }

    function getUserDetails($table, $username, $connobject) 
    {         $sql = "SELECT * FROM $table WHERE username = '$username'";         
        $result = $connobject->query($sql);        
         return $result->fetch_assoc();  }
 
         function showBlockedUser($table, $connobject) {
            $sql = "SELECT * FROM $table WHERE is_active = 0"; // Query to fetch blocked customers
            $result = $connobject->query($sql);
            return $result;
        }
 
    function addManager($table, $username, $full_name, $gender, $email, $phone, $password, $address, $picture, $document, $connobject){
        $sql = "INSERT INTO $table (username, full_name, gender, email, phone, password, address, picture, document) 
        VALUES ('$username', '$full_name', '$gender', '$email', '$phone', '$password', '$address', '$picture', '$document')";
        return $connobject->query($sql);
    }
 
    function login($table, $username, $password, $connobject){
        $sql = "SELECT username, password FROM $table WHERE username='$username' AND password='$password'";
        $result = $connobject->query($sql);
        return $result;
    }
 
    function showAllUsers($table, $connobject){
        $sql = "SELECT * FROM $table";
        $result = $connobject->query($sql);
        return $result;
    }


    function deleteUser($table, $username, $connobject) {
        $sql = "DELETE FROM $table WHERE username = '$username'";
        return $connobject->query($sql);
    }
 
    function searchUserByID($table, $connobject, $id){
        $sql = "SELECT * FROM $table WHERE id='$id'";
        $result = $connobject->query($sql);
        return $result;
    }

    function updateUserStatus($table, $username, $is_active, $connobject) {
        $sql = "UPDATE $table SET is_active = '$is_active' WHERE username = '$username'";
        return $connobject->query($sql);
    }
 
    function updateUserByID($table, $connobject, $id, $username, $full_name, $gender, $email, $phone, $password, $address, $picture, $document){
        $sql = "UPDATE $table SET username='$username', full_name='$full_name', gender='$gender', email='$email', phone='$phone', password='$password', address='$address', picture='$picture', document='$document' WHERE id = '$id'";
        $result = $connobject->query($sql);
        return $result;
    }
 
    function closeCon($connobject){
        $connobject->close();
    }
}
 
?>
