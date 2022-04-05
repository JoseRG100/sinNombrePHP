<?php
require_once 'models/adminModel/adminEntity.php';
require_once 'models/adminModel/DAOAdminImpl.php';

class adminController {
    //TODO: ESTA FUNCIÓN SERÁ UTILIZADA CUANDO UNA SESIÓN PREVIAMENTE INICIALIZADA SE ENCUENTRE EN LA MEMORIA CACHE
    public function index(){
        //echo "Controlador student, Acción index";
    }

    public function register(){
        //[THIS FUNCTION IT'S UNNECESSARY, BECAUSE THE ADMIN
        // CAN BE JUST CREATED BY ONE DATABASE_ADMIN]
    }

}