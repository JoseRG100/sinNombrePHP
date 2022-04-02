<?php

class teacherController{
    //TODO: ¿Porqué es necesaria está función?
    public function index(){
        echo "Controlador Teacher, Acción index";
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

}