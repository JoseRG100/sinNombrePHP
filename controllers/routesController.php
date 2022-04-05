<?php

/**
 * ALL THE LINKS THAT ENRUTING THE DIFFERENT URL's
 * ON THE VIEWS ARE HERE.
 */
class routesController {

    public function index(){
        require_once 'views/login.php';
    }

    public function studentRegister(){
        require_once 'views/student/studentRegister.php';
    }

    public static function signOff(){
        require_once 'views/login.php';
    }

}