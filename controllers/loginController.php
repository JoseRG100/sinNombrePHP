<?php
//DEPENDENCIES
require_once 'models/adminModel/DAOAdminImpl.php';
require_once 'models/teacherModel/DAOTeacherImpl.php';
require_once 'models/studentModel/DAOStudentImpl.php';


class loginController {

    //TODO: FALTAN HACER TODAS LAS VALIDACIONES
    public function login(){
        if(isset($_POST)){

            $_SESSION['admin']      = false;
            $_SESSION['teacher']    = false;
            $_SESSION['student']    = false;

            //SEARCHING INTO ADMIN_DB
            $admin = DAOAdminImpl::findByLogin($_POST['email'], $_POST['password']);

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

                    else {

                    //SEARCHING INTO STUDENT_DB
                    $student = DAOStudentImpl::findByLogin($_POST['email'], $_POST['password']);

                    if($student){

                        $_SESSION['identity'] = $student;
                        $_SESSION['student'] = true;
                        header("Location:".base_url.'/views/home.php');

                    }

                    else {
                        //$_SESSION['error_login'] = ['Identificacion fallida'];
                        echo 'Identificación Fallida';
                    }
                }
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