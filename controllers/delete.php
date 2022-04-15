<?php
require_once '../config/db.php';
require_once '../models/DAOinterface.php';
require_once '../models/teacherModel/teacherEntity.php';
require_once '../models/teacherModel/DAOTeacherImpl.php';

    if( isset( $_GET['id'] ) ) {
        $id_teacher = $_GET['id'];
        $deleteSuccessful = DAOTeacherImpl::delete($id_teacher);

        if( $deleteSuccessful ){

            $_SESSION['teacherDelete']  = "complete";
            $_SESSION['message'] = 'Profesor, eliminado correctamente.';
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