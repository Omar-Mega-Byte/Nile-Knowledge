<?php
require 'DBController.php';

class User {
private $email;
private $password;
private $role;
public function __construct($email = null,$password = null,$role = null) {
    $this->email = $email;
    $this->role = $role;
    $this->password= $password;
}
public function getEmail (){
    return $this->email;
}
public function setEmail ($email){
    $this->email=$email;
}

public function getPassword (){
    return $this->password;
}
public function setPassword ($password){
    $this->password=$password;
}

public function getRole (){
    return $this->role;
}
public function setRole ($role){
    $this->role=$role;
}

public function redirect($url)
{
    header("Location: $url");
    exit();
}

public function login($email,$password){
    $newController = new DBController();
    $newController->openConnection();
    $sql = "SELECT * FROM `users` WHERE email ='$email' AND password='$password'";
    if ($newController->select($sql)) {
        $sql = "SELECT `role` FROM `users` WHERE email ='$email'";
        $result = $newController->select($sql);
        foreach ($result as $row) {
            $r = $row['role'];}
        if($r == 'Student')
            $this->redirect('../Views/home.html');
        else
            $this->redirect('../Views/professor.html');
    } else {
        $this->redirect('../Views/error.html');
    }
    $newController->closeConnection();
}
}
?>