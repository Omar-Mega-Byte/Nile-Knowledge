<?php
require '../Models/DBController.php';
class Student {
    public function bookCourse() {

    }
    public function searchCourses() {

    }
    public function cancelBooking() {

    }
    public function getUserInfoByEmail($userEmail)
    {
        $newController = new DBController();
        $newController->openConnection();
        $sql = "SELECT * FROM `users` WHERE email ='$userEmail'";
        $userInfo = $newController->select($sql);
        $newController->closeConnection();
        if ($userInfo !== false) {
            return $userInfo[0];
        } else {
            return false;
        }
    }
    public function addUser() {

    }
}

?>