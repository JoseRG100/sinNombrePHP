<?php
require_once 'models/teacherModel/teacherEntity.php';
require_once 'models/teacherModel/DAOTeacherImpl.php';

class teacherController {
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

            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $surname    = isset($_POST['surname']) ? $_POST['surname'] : false;
            $telephone  = isset($_POST['telephone']) ? $_POST['telephone'] : false;
            $nif        = isset($_POST['nif']) ? $_POST['nif'] : false;
            $email      = isset($_POST['email']) ? $_POST['email'] : false;
            $password   = isset($_POST['password']) ? $_POST['password'] : false;

            if($name && $surname && $telephone && $nif && $email && $password){
                $newTeacher = new teacherEntity();
                $newTeacher->setName($name);
                $newTeacher->setSurname($surname);
                $newTeacher->setTelephone($telephone);
                $newTeacher->setNif($nif);
                $newTeacher->setEmail($email);
                $newTeacher->setPassword($password);

                $registerSuccessful = DAOTeacherImpl::insert($newTeacher);

                //TODO: FALTAN TODAS LAS VALIDACIONES
                if($registerSuccessful){

                    $_SESSION['teacherRegister'] = "complete";
                    header("Location:".base_url.'/home');

                }else{
                    $_SESSION['teacherRegister'] = "failed";
                }

            }else{
                $_SESSION['teacherRegister'] = "failed";
            }

        }else{
            $_SESSION['teacherRegister'] = "failed";
        }

        header("Location:".base_url.'/home');

    }

}