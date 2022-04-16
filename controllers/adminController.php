<?php
require_once 'models/adminModel/adminEntity.php';
require_once 'models/adminModel/DAOAdminImpl.php';

class adminController {

    public function actionDefault(){
        Utils::showError();
    }

    public function register(){
        //[THIS FUNCTION IT'S UNNECESSARY, BECAUSE THE ADMIN
        // CAN BE JUST CREATED BY ONE DATABASE_ADMIN]
    }

}