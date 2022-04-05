<?php
require_once 'models/studentModel/studentEntity.php';
require_once 'models/studentModel/DAOStudentImpl.php';

class studentController {
    //TODO: ESTA FUNCIÓN SERÁ UTILIZADA CUANDO UNA SESIÓN PREVIAMENTE INICIALIZADA SE ENCUENTRE EN LA MEMORIA CACHE
    public function index(){
        //echo "Controlador student, Acción index";
    }

    //TODO: FALTAN TODAS LAS VALIDACIONES
    /**
     * Reads the INPUTS from the REGISTER URL, and creates a new STUDENT on the DATABASE
     * @return void
     */
    public function register(){
        if(isset($_POST)){

            $username   = (isset($_POST['username']) && ($_POST['username'] != '')) ? $_POST['username'] : false;
            $password   = (isset($_POST['password']) && ($_POST['password'] != ''))  ? $_POST['password'] : false;
            $email      = (isset($_POST['email']) && ($_POST['email'] != ''))  ? $_POST['email'] : false;
            $name       = (isset($_POST['name']) && ($_POST['name'] != ''))  ? $_POST['name'] : false;
            $surname    = (isset($_POST['surname']) && ($_POST['surname'] != ''))  ? $_POST['surname'] : false;
            $telephone  = (isset($_POST['telephone']) && ($_POST['telephone'] != ''))  ? $_POST['telephone'] : false;
            $nif        = (isset($_POST['nif']) && ($_POST['nif'] != ''))  ? $_POST['nif'] : false;


            if($username && $password && $email && $name && $surname && $telephone && $nif){
                $newStudent = new studentEntity();
                $newStudent->setUsername($username);
                $newStudent->setPassword($password);
                $newStudent->setEmail($email);
                $newStudent->setName($name);
                $newStudent->setSurname($surname);
                $newStudent->setTelephone($telephone);
                $newStudent->setNif($nif);
                //TODO: FALTA SET date_registered

                $registerSuccessful = DAOStudentImpl::insert($newStudent);

                if($registerSuccessful){
                    $_SESSION['register'] = "complete";
                    header("Location:".base_url);
                }else{
                    $_SESSION['register'] = "failed";
                }

            }else{
                $_SESSION['register'] = "failed";
            }

        }else{
            $_SESSION['register'] = "failed";
        }

    }

}