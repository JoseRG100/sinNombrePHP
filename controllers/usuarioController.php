<?php
//DEPENDENCIES
require_once 'models/usuario.php';

//CLASS
class usuarioController{

    //TODO: ANALIZAR ESTA FUNCIÓN
    public function index(){
        echo "Controlador Usuarios, Acción index";
        //renderizar vista
        //require_once 'views/usuario/destacados.php';
    }

    //TODO: ANALIZAR ESTA FUNCIÓN
    public function registro(){
        require_once 'views/usuario/registro.php';
    }

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

}

/* DEAD CODE

 */