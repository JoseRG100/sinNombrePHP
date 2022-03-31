<?php
//DEPENDENCIES
require_once 'models/usuario.php';


class loginController {

    public function login(){
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

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        //redirección
        header("Location:".base_url);
    }
}