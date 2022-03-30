<?php
//DEPENDENCIES
require_once 'models/usuario.php';

//CLASS
class usuarioController{
    public function index(){
        echo "Controlador Usuarios, Acción index";
           
        //renderizar vista
        //require_once 'views/usuario/destacados.php';
    }         
    
    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function register(){
        if(isset($_POST)){
                      
            $username   = isset($_POST['username']) ? $_POST['username'] : false;
            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $email      = isset($_POST['email']) ? $_POST['email'] : false;
            $password   = isset($_POST['password']) ? $_POST['password'] : false;
            
            if($username && $name && $email && $password){
                $usuario = new Usuario();
                $usuario->setUsername($username);
                $usuario->setName($name);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
               // $usuario->setRol($rol);

                $save = $usuario->save();

                if($save){
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

    public function login(){
        if(isset($_POST)){
            //Identificar al usuario
            //Consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();
            session_start();
            $_SESSION['identity'] = $identity;

            /*
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                //if($identity->rol == 'admin'){
                //    $_SESSION['admin'] = true;
                //}
            }else{
                $_SESSION['error_login'] = ['Identificacion fallida'];
            }
            */

            //redirección
            header("Location:".base_url.'/views/usuario/home.php');

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
