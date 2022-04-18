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

            $id_student       = isset($_POST['id_student']) ? $_POST['id_student'] : false;
            $id_course    = isset($_POST['id_course']) ? $_POST['id_course'] : false;
            $status  = isset($_POST['status']) ? $_POST['status'] : false;


            if($id_student && $id_course && $status){
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

}