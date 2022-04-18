<?php

class enrollmentController {

    public function save(){
        if(isset($_POST['btn-sendEnrollment'])){

            var_dump($_POST['id_student']);
            var_dump($_POST['id_course']);

            $_SESSION['courseEnrollment'] = "complete";
            $_SESSION['message']        = 'Se han lanzado los datos correctamente';
        } else {
            $_SESSION['courseEnrollment'] = "failed";
            $_SESSION['message']        = 'No se ha podido hacer nada.';
        }
    }

}