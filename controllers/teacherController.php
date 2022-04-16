<?php
require_once 'models/teacherModel/teacherEntity.php';
require_once 'models/teacherModel/DAOTeacherImpl.php';

class teacherController {

    public function actionDefault(){
        Utils::showError();
    }

    //TODO: FALTAN TODAS LAS VALIDACIONES
    /**
     * Reads the INPUTS from the REGISTER URL, and creates a new STUDENT on the DATABASE
     * @return void
     */
    public function register(){

        Utils::isAdmin();
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

    //TODO: FALTAN TODAS LAS VALIDACIONES
    public function update(){

        Utils::isAdmin();
        if(isset($_POST)){

            $id_course  = isset($_POST['id_course']) ? $_POST['id_course'] : false;
            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $surname    = isset($_POST['surname']) ? $_POST['surname'] : false;
            $telephone  = isset($_POST['telephone']) ? $_POST['telephone'] : false;
            $nif        = isset($_POST['nif']) ? $_POST['nif'] : false;
            $email      = isset($_POST['email']) ? $_POST['email'] : false;
            $password   = isset($_POST['password']) ? $_POST['password'] : false;

            //TODO: FALTAN TODAS LAS VALIDACIONES
            if( $id_course && $name && $surname && $telephone && $nif && $email && $password){
                $changedTeacher = new teacherEntity();
                $changedTeacher->setName($name);
                $changedTeacher->setSurname($surname);
                $changedTeacher->setTelephone($telephone);
                $changedTeacher->setNif($nif);
                $changedTeacher->setEmail($email);
                $changedTeacher->setPassword($password);

                $updateSuccessful = DAOTeacherImpl::update($id_course, $changedTeacher);

                if( $updateSuccessful ){

                    $_SESSION['teacherUpdate']  = "complete";
                    $_SESSION['message']        = 'Profesor, actualizado correctamente.';

                }else{
                    $_SESSION['teacherUpdate'] = "failed";
                    $_SESSION['message'] = 'Error. El registro no pudo ingresar a la BBDD';
                }

            }else{
                $_SESSION['teacherUpdate'] = "failed";
                $_SESSION['message'] = 'Error. Uno de los datos no se capturó correctamente';
            }

        }else{
            $_SESSION['teacherUpdate'] = "failed";
            $_SESSION['message'] = 'Error. La solicitud REST no fue enviada correctamente';
        }

        header("Location:".base_url.'/home');

    }

    public function delete(){

        Utils::isAdmin();
        if( isset( $_GET['id'] ) ) {
            $id_teacher = $_GET['id'];
            $deleteSuccessful = DAOTeacherImpl::delete($id_teacher);

            if( $deleteSuccessful ){
                $_SESSION['teacherDelete']  = "complete";
                $_SESSION['message']        = 'Profesor, eliminado correctamente.';

            }else {
                $_SESSION['teacherDelete'] = "failed";
                $_SESSION['message'] = 'Error. El registro no se encontró en la BBDD.';
            }

        }else {
            $_SESSION['teacherDelete'] = "failed";
            $_SESSION['message'] = 'Error. Tipo de solicitud incorrectemante enviado.';
        }

        header("Location:".base_url.'/home');

    }

}