<?php
require_once 'models/classModel/classEntity.php';
require_once 'models/classModel/DAOClassImpl.php';

class classController {
    //TODO: ESTA FUNCIÓN SERÁ UTILIZADA CUANDO UNA SESIÓN PREVIAMENTE INICIALIZADA SE ENCUENTRE EN LA MEMORIA CACHE
    public function index()
    {
        //    echo "Controlador Class, Acción index";

    }

    //TODO: FALTAN TODAS LAS VALIDACIONES
    /**
     * Reads the INPUTS from the REGISTER URL, and creates a new STUDENT on the DATABASE
     * @return void
     */
    public function register(){
        if(isset($_POST)){

            $id_teacher     = isset($_POST['id_teacher']) ? $_POST['id_teacher'] : false;
            $id_course      = isset($_POST['id_course']) ? $_POST['id_course'] : false;
            $name           = isset($_POST['name']) ? $_POST['name'] : false;
            $color          = isset($_POST['color']) ? $_POST['color'] : false;


            if($id_teacher && $id_course  && $name && $color){
                $newClass = new classEntity();
                $newClass->setIdTeacher($id_teacher);
                $newClass->setIdCourse($id_course);
                $newClass->setName($name);
                $newClass->setColor($color);


                $registerSuccessful = DAOClassImpl::insert($newClass);

                //TODO: FALTAN TODAS LAS VALIDACIONES
                if($registerSuccessful){

                    $_SESSION['classRegister'] = "complete";
                    $_SESSION['message'] = 'Clase, registrada correctamente.';
                    header("Location:".base_url.'/home');

                }else{
                    $_SESSION['classRegister'] = "failed";
                    $_SESSION['message'] = 'Error. El registro no pudo ingresar a la BBDD';
                }

            }else{
                $_SESSION['classRegister'] = "failed";
                $_SESSION['message'] = 'Error. Uno de los datos no se capturó correctamente';
            }

        }else{
            $_SESSION['classRegister'] = "failed";
            $_SESSION['message'] = 'Error. La solicitud REST no fue enviada correctamente';
        }

        header("Location:".base_url.'/home');

    }

    public function update(){
        if(isset($_POST)){

            $id_class = isset($_POST['id_class']) ? $_POST['id_class'] : false;
            $id_teacher = isset($_POST['id_teacher']) ? $_POST['id_teacher'] : false;
            $id_course = isset($_POST['id_course']) ? $_POST['id_course'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $color = isset($_POST['color']) ? $_POST['color'] : false;

            if($id_class && $id_teacher && $id_course && $name && $color){
                $changedClass = new classEntity();
                $changedClass->setIdTeacher($id_teacher);
                $changedClass->setIdCourse($id_course);
                $changedClass->setName($name);
                $changedClass->setColor($color);

                $updateSuccessful = DAOClassImpl::update($id_class, $changedClass);

                if( $updateSuccessful ){

                    $_SESSION['classUpdate']  = "complete";
                    $_SESSION['message']        = 'Clase, actualizada correctamente.';
                    header("Location:".base_url.'/home');

                }else{
                    $_SESSION['classUpdate'] = "failed";
                    $_SESSION['message'] = 'Error. El registro no pudo ingresar a la BBDD';
                    header("Location:".base_url.'/home');

                }

            }else{
                //TODO: SE PUEDE OCUPAR PARA EL $_SESSION[message]
                $_SESSION['classUpdate'] = "failed";
                $_SESSION['message'] = 'Error. Uno de los datos no se capturó correctamente';
                header("Location:".base_url.'/home');
            }

        }else{
            //TODO: SE PUEDE OCUPAR PARA EL $_SESSION[msg-txt]
            $_SESSION['classUpdate'] = "failed";
            $_SESSION['message'] = 'Error. La solicitud REST no fue enviada correctamente';
            header("Location:".base_url.'/home');
        }

        //header("Location:".base_url.'/home');

    }

    public function delete(){

        if( isset( $_GET['id'] ) ) {
            $id_class = $_GET['id'];
            $deleteSuccessful = DAOClassImpl::delete($id_class);

            if( $deleteSuccessful ){
                $_SESSION['classDelete']  = "complete";
                $_SESSION['message']        = 'Clase, eliminada correctamente.';
                header("Location:".base_url.'/home');
            }else {
                $_SESSION['classDelete'] = "failed";
                $_SESSION['message'] = 'Error. El registro no se encontró en la BBDD.';
                header("Location:".base_url.'/home');
            }

        }else {
            $_SESSION['classDelete'] = "failed";
            $_SESSION['message'] = 'Error. Tipo de solicitud incorrectemante enviado.';
            header("Location:".base_url.'/home');
        }

    }



}