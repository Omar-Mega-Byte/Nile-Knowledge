<?php
require 'User.php';
class EducationalUser extends User{
    private $username;
    private $id;

    public function __construct($username = null, $id = null) {
        $this->username = $username;
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function register($username, $email, $password,$role) {
        $newController = new DBController();
        $newController->openConnection();
        $sql = "INSERT INTO `users` (`username`,`email`, `password`,`role`) VALUES ('$username','$email','$password','$role')";
        if ($newController->insert($sql)) {
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