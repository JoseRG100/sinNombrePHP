<?php
//DEPENDENCIES
require_once 'models/adminModel/DAOAdminImpl.php';
require_once 'models/teacherModel/DAOTeacherImpl.php';
require_once 'models/studentModel/DAOStudentImpl.php';


class loginController {

    //TODO: DOCUMENTAR TODAS LAS FUNCIONES CON /**
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
                unset($_SESSION['teacher']);
                unset($_SESSION['student']);

                header("Location:".base_url.'/home.php');


            } else {

                //SEARCHING INTO TEACHER_DB
                $teacher = DAOTeacherImpl::findByLogin($_POST['email'], $_POST['password']);

                if($teacher && is_object($teacher)){

                    $_SESSION['identity'] = $teacher;
                    $_SESSION['teacher'] = true;
                    unset($_SESSION['admin']);
                    unset($_SESSION['student']);

                    header("Location:".base_url.'/home.php');

                }

                    else {

                    //SEARCHING INTO STUDENT_DB
                    $student = DAOStudentImpl::findByLogin($_POST['email'], $_POST['password']);

                    if($student && is_object($student)){

                        $_SESSION['identity'] = $student;
                        $_SESSION['student'] = true;
                        unset($_SESSION['admin']);
                        unset($_SESSION['teacher']);

                        header("Location:".base_url.'/home.php');

                    }

                    else {
                        $_SESSION['error_login'] = 'Error. Identificación fallida.';
                        header("Location:".base_url);
                    }
                }
            }
        }
    }

    public static function logout(){

        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        if(isset($_SESSION['teacher'])){
            unset($_SESSION['teacher']);
        }

        if(isset($_SESSION['student'])){
            unset($_SESSION['student']);
        }

        //REDIRECTION
        header("Location:".base_url);

    }
}