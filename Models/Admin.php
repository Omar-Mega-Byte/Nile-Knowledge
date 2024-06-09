<?php
require 'User.php';
class Admin extends User{

    public function addUser($username, $email, $password, $role,$id) {
        $newController = new DBController();
        $newController->openConnection();
        $sql = "INSERT INTO `users` (`username`,`email`, `password`,`role`,`id`) VALUES ('$username','$email','$password','$role',$id)";
        if ($newController->insert($sql)) {
            $this->redirect('../Views/admin.php');
        }
        $newController->closeConnection();
    }

    public function updateUser($oldEmail,$username, $email, $password, $role,$id) {
        $newController = new DBController();
        $newController->openConnection();
        $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`role`='$role',`id`='$id' WHERE email='$oldEmail'";
        if ($newController->update($sql)) {
        $this->redirect('../Views/admin.php');
    }
    $newController->closeConnection();
}

    public function deleteUser($email) {
        $newController = new DBController();
        $newController->openConnection();
        $sql = "DELETE FROM `users` WHERE email ='$email' ";
        if ($newController->update($sql)) {
            $this->redirect('../Views/admin.php');
        }
        $newController->closeConnection();

    }

    public function listUsers() {
        $newController = new DBController();
        $newController->openConnection();
        $sql = "SELECT * FROM `users`";
        $result = $newController->select($sql);
        return $result;
    }

    public function searchUser() {

    }
}

?>