<?php
//DEPENDENCIES
require_once 'models/usuario.php';
require_once 'models/teacherModel/DAOTeacherImpl.php';
require_once 'models/studentModel.php';


class loginController {

    /**
     * @return void
     */
    public function login(){
        if(isset($_POST)){

            $_SESSION['admin']      = false;
            $_SESSION['teacher']    = false;
            $_SESSION['student']    = false;

            //SEARCHING INTO ADMIN_DB
            $admin = usuario::login($_POST['email'], $_POST['password']);

            if($admin && is_object($admin)){

                $_SESSION['identity']   = $admin;
                $_SESSION['admin']      = true;
                header("Location:".base_url.'/views/home.php');


            } else {

                //SEARCHING INTO TEACHER_DB
                $teacher = DAOTeacherImpl::findByLogin($_POST['email'], $_POST['password']);

                if($teacher && is_object($teacher)){

                    $_SESSION['identity'] = $teacher;
                    $_SESSION['teacher'] = true;
                    header("Location:".base_url.'/views/home.php');

                }
                /*
                    else {

                    //SEARCHING INTO STUDENT_DB
                    $student = studentModel::login($_POST['email'], $_POST['password']);

                    if($student){

                        $_SESSION['identity'] = $student;
                        $_SESSION['student'] = true;
                        header("Location:".base_url.'/views/home.php');

                    }
*/
                    else {
                        //$_SESSION['error_login'] = ['Identificacion fallida'];
                        echo 'Identificación Fallida';
                    }
                }
            }
    }




    public function login_callback(){
        if(isset($_POST)){
            //Identificar al usuario
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            //Consulta a la base de datos
            $identity = $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                //if($identity->rol == 'admin'){
                $_SESSION['admin'] = true;
                header("Location:".base_url.'/views/home.php');
            }else{
                //$_SESSION['error_login'] = ['Identificacion fallida'];
                echo 'Identificación Fallida';
            }

        }
    }

    //TODO: Terminar está función con todos los tipos de usuarios.
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        //REDIRECTION
        header("Location:".base_url);
    }
}