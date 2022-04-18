<?php
require_once 'models/enrollmentModel/enrollmentEntity.php';
require_once 'models/enrollmentModel/DAOEnrollmentImpl.php';

class enrollmentController {

    public function actionDefault(){
        Utils::showError();
    }

    public function save(){

        //var_dump($_POST['id_student']);
        //var_dump($_POST['id_course']);


        Utils::isStudent();
        if(isset($_POST)){

            $id_class = isset($_POST['id_class']) ? $_POST['id_class'] : false;
            $id_class_string = intval($id_class);
            $id_course  = isset($_POST['id_course']) ? $_POST['id_course'] : false;
            $id_course_string = intval($id_course);
            $status     = 0;

            if( $id_class && $id_course ){
                $newEnrollment = new enrollmentEntity();
                $newEnrollment->setIdStudent($id_class_string);
                $newEnrollment->setIdCourse($id_course_string);
                $newEnrollment->setStatus($status);

                $registerSuccessful = DAOEnrollmentImpl::insert($newEnrollment);


                if($registerSuccessful){

                    $_SESSION['courseEnrollment'] = "complete";
                    $_SESSION['message'] = 'Te has suscrito correctamente';

                }else{
                    $_SESSION['courseEnrollment'] = "failed";
                    $_SESSION['message'] = 'La Query no ha hecho match con la BBDD';
                }

            }else{
                $_SESSION['courseEnrollment'] = "failed";
                $_SESSION['message'] = 'No se han inicializado bien las variables';
            }

        }else{
            $_SESSION['courseEnrollment'] = "failed";
            $_SESSION['message'] = 'El método que conecta la vista con el controlador no ha ingresado correctamente';
        }

        header("Location:".base_url.'/home');

    }


    public function delete(){

        Utils::isStudent();
        if( isset( $_GET['id'] ) ) {
            $id_enrollment = $_GET['id'];
            $deleteSuccessful = DAOEnrollmentImpl::delete($id_enrollment);

            if( $deleteSuccessful ){
                $_SESSION['enrollmentDelete']  = "complete";
                $_SESSION['message']        = 'Enrollment, eliminado correctamente.';

            }else {
                $_SESSION['enrollmentrDelete'] = "failed";
                $_SESSION['message'] = 'Error. El registro no se encontró en la BBDD.';
            }

        }else {
            $_SESSION['enrollmentDeleteDelete'] = "failed";
            $_SESSION['message'] = 'Error. Tipo de solicitud incorrectemante enviado.';
        }

        header("Location:".base_url.'/home');

    }

}