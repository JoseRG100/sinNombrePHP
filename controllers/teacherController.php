<?php
require_once 'models/teacherModel/teacherEntity.php';
require_once 'models/teacherModel/DAOTeacherImpl.php';

class teacherController{
    //TODO: ESTA FUNCIÓN SERÁ UTILIZADA CUANDO UNA SESIÓN PREVIAMENTE INICIALIZADA SE ENCUENTRE EN LA MEMORIA CACHE
    public function index(){
    //    echo "Controlador Teacher, Acción index";
    }

    //TODO: FALTAN TODAS LAS VALIDACIONES
    /**
     * Reads the INPUTS from the REGISTER URL, and creates a new STUDENT on the DATABASE
     * @return void
     */
    public function register(){
        if(isset($_POST)){

            $username   = isset($_POST['username']) ? $_POST['username'] : false;
            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $email      = isset($_POST['email']) ? $_POST['email'] : false;
            $password   = isset($_POST['password']) ? $_POST['password'] : false;

            if($username && $name && $email && $password){
                $newAdmin = new adminEntity();
                $newAdmin->setUsername($username);
                $newAdmin->setName($name);
                $newAdmin->setEmail($email);
                $newAdmin->setPassword($password);

                $registerSuccessful = DAOAdminImpl::insert($newAdmin);

                if($registerSuccessful){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }

            }else{
                $_SESSION['register'] = "failed";
            }

        }else{
            $_SESSION['register'] = "failed";
        }

        header("Location:".base_url);

    }

}