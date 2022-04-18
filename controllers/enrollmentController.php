<?php

class enrollmentController {

    public function actionDefault(){
        Utils::showError();
    }

    public function save(){

        //var_dump($_POST['id_student']);
        //var_dump($_POST['id_course']);

        Utils::isStudent();
        if(isset($_POST)){

            $id_student = isset($_POST['id_student']) ? $_POST['id_student'] : false;
            $id_course  = isset($_POST['id_course']) ? $_POST['id_course'] : false;
            $status     = 0;


            if( $id_student && $id_course ){
                $newEnrollment = new enrollmentEntity();
                $newEnrollment->setIdStudent($id_student);
                $newEnrollment->setIdCourse($id_course);
                $newEnrollment->setStatus($status);

                $registerSuccessful = DAOEnrollmentImpl::insert($newEnrollment);


                if($registerSuccessful){

                    $_SESSION['enrollmentRegister'] = "complete";

                }else{
                    $_SESSION['enrollmentRegister'] = "failed";
                }

            }else{
                $_SESSION['enrollmentRegister'] = "failed";
            }

        }else{
            $_SESSION['enrollmentRegister'] = "failed";
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