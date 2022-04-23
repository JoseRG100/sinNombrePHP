<?php
require_once 'models/studentModel/studentEntity.php';
require_once 'models/studentModel/DAOStudentImpl.php';

class studentController {

    public function actionDefault(){
        Utils::showError();
    }

    //TODO: FALTAN TODAS LAS VALIDACIONES
    /**
     * Reads the INPUTS from the REGISTER URL, and creates a new STUDENT on the DATABASE
     * @return void
     */
    public function register(){
        if(isset($_POST)){

            $username   = (isset($_POST['username']) && ($_POST['username'] != '')) ? $_POST['username'] : false;
            $password   = (isset($_POST['password']) && ($_POST['password'] != ''))  ? $_POST['password'] : false;
            $email      = (isset($_POST['email']) && ($_POST['email'] != ''))  ? $_POST['email'] : false;
            $name       = (isset($_POST['name']) && ($_POST['name'] != ''))  ? $_POST['name'] : false;
            $surname    = (isset($_POST['surname']) && ($_POST['surname'] != ''))  ? $_POST['surname'] : false;
            $telephone  = (isset($_POST['telephone']) && ($_POST['telephone'] != ''))  ? $_POST['telephone'] : false;
            $nif        = (isset($_POST['nif']) && ($_POST['nif'] != ''))  ? $_POST['nif'] : false;


            if($username && $password && $email && $name && $surname && $telephone && $nif){
                $newStudent = new studentEntity();
                $newStudent->setUsername($username);
                $newStudent->setPassword($password);
                $newStudent->setEmail($email);
                $newStudent->setName($name);
                $newStudent->setSurname($surname);
                $newStudent->setTelephone($telephone);
                $newStudent->setNif($nif);
                //TODO: FALTA SET date_registered

                $registerSuccessful = DAOStudentImpl::insert($newStudent);

                if($registerSuccessful){
                    $_SESSION['studentUpdate'] = "complete";
                    $_SESSION['message'] = "Has cambiado tus datos correctamente";
                    header("Location:".base_url);
                }else{
                    $_SESSION['studentUpdate'] = "failed";
                    $_SESSION['message'] = "No has puesto bien uno de tus datos";
                }

            }else{
                $_SESSION['studentUpdate'] = "failed";
                $_SESSION['message'] = "No se han recibido bien los datos";
            }

        }else{
            $_SESSION['studentUpdate'] = "failed";
            $_SESSION['message'] = "No se ha recibido bien el método de envio";
        }

    }

    public function update(){

        //var_dump($_POST);

        if(isset($_POST)){

            $id         = isset($_POST['id']) ? $_POST['id'] : false;
            $username   = isset($_POST['username']) ? $_POST['username'] : false;
            $password   = isset($_POST['password']) ? $_POST['password'] : false;
            $email      = isset($_POST['email']) ? $_POST['email'] : false;
            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $surname    = isset($_POST['surname']) ? $_POST['surname'] : false;
            $telephone  = isset($_POST['telephone']) ? $_POST['telephone'] : false;
            $nif        = isset($_POST['nif']) ? $_POST['nif'] : false;
            $date_registered = isset($_POST['date_registered']) ? $_POST['date_registered'] : false;


            if($id && $username && $password && $email && $name && $surname && $telephone
                && $nif ){
                $changedStudent = new studentEntity();
                $changedStudent->setUsername($username);
                $changedStudent->setPassword($password);
                $changedStudent->setEmail($email);
                $changedStudent->setName($name);
                $changedStudent->setSurname($surname);
                $changedStudent->setTelephone($telephone);
                $changedStudent->setNif($nif);
                //$changedStudent->setDateRegistered($date_registered);


                $updateSuccessful = DAOStudentImpl::update($id, $changedStudent);

                if( $updateSuccessful ){

                    $_SESSION['studentUpdate']  = "complete";
                    $_SESSION['message']        = 'Estudiante, actualizado correctamente.';

                }else{
                    $_SESSION['studentUpdate'] = "failed";
                    $_SESSION['message'] = 'Error. El registro no pudo ingresar a la BBDD';
                }

            }else{
                $_SESSION['studentUpdate'] = "failed";
                $_SESSION['message'] = 'Error. Uno de los datos no se capturó correctamente';
            }

        }else{
            $_SESSION['studentUpdate'] = "failed";
            $_SESSION['message'] = 'Error. La solicitud REST no fue enviada correctamente';
        }

        header("Location:".base_url.'/home');

    }

}