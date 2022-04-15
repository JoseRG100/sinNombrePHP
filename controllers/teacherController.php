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

    public function update(){
        if(isset($_POST)){

            $id_teacher = isset($_POST['id_teacher']) ? $_POST['id_teacher'] : false;
            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $surname    = isset($_POST['surname']) ? $_POST['surname'] : false;
            $telephone  = isset($_POST['telephone']) ? $_POST['telephone'] : false;
            $nif        = isset($_POST['nif']) ? $_POST['nif'] : false;
            $email      = isset($_POST['email']) ? $_POST['email'] : false;
            $password   = isset($_POST['password']) ? $_POST['password'] : false;

            if( $id_teacher && $name && $surname && $telephone && $nif && $email && $password){
                $changedTeacher = new teacherEntity();
                $changedTeacher->setName($name);
                $changedTeacher->setSurname($surname);
                $changedTeacher->setTelephone($telephone);
                $changedTeacher->setNif($nif);
                $changedTeacher->setEmail($email);
                $changedTeacher->setPassword($password);

                $updateSuccessful = DAOTeacherImpl::update($id_teacher, $changedTeacher);

                if( $updateSuccessful ){

                    $_SESSION['teacherUpdate']  = "complete";
                    $_SESSION['message']        = 'Profesor, actualizado correctamente.';
                    header("Location:".base_url.'/home');

                }else{
                    $_SESSION['teacherUpdate'] = "failed";
                    $_SESSION['message'] = 'Error. El registro no pudo ingresar a la BBDD';
                    header("Location:".base_url.'/home');

                }

            }else{
                //TODO: SE PUEDE OCUPAR PARA EL $_SESSION[message]
                $_SESSION['teacherUpdate'] = "failed";
                $_SESSION['message'] = 'Error. Uno de los datos no se capturó correctamente';
                header("Location:".base_url.'/home');
            }

        }else{
            //TODO: SE PUEDE OCUPAR PARA EL $_SESSION[msg-txt]
            $_SESSION['teacherUpdate'] = "failed";
            $_SESSION['message'] = 'Error. La solicitud REST no fue enviada correctamente';
            header("Location:".base_url.'/home');
        }

        //header("Location:".base_url.'/home');

    }

    public function delete(){
        var_dump($_GET);
        /*
        if( isset( $_GET['id'] ) ) {
            $id_teacher = $_GET['id'];
            $deleteSuccessful = DAOTeacherImpl::delete($id_teacher);

            if( $deleteSuccessful ){
                $_SESSION['teacherDelete']  = "complete";
                $_SESSION['message']        = 'Profesor, eliminado correctamente.';
                header("Location:".base_url.'/home');
            }else {
                $_SESSION['teacherDelete'] = "failed";
                $_SESSION['message'] = 'Error. El registro no se encontró en la BBDD.';
                header("Location:".base_url.'/home');
            }

        }else {
            $_SESSION['teacherDelete'] = "failed";
            $_SESSION['message'] = 'Error. Tipo de solicitud incorrectemante enviado.';
            header("Location:".base_url.'/home');
        }
        */
        if( isset( $_GET['id'] ) ) {
            $_SESSION['teacherDelete']  = "complete";
            $_SESSION['message']        = 'Profesor, eliminado correctamente.';
            header("Location:".base_url.'/home');
        }else {
            $_SESSION['teacherDelete'] = "failed";
            $_SESSION['message'] = 'Super error.';
            header("Location:".base_url.'/home');
        }
    }

}