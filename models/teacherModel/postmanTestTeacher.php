<?php

    require_once "../../config/db.php";
    require_once "../DAOinterface.php";
    require_once "DAOTeacherImpl.php";
    require_once "teacherEntity.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        // -------- TESTING CREATE METHODS WITH POSTMAN --------- //
        case 'POST':
            $newTeacher = new teacherEntity();
            $inputData = json_decode(file_get_contents('php://input'));

            if ( $inputData != NULL ) {

                $newTeacher->setName($inputData->name);
                $newTeacher->setSurname($inputData->surname);
                $newTeacher->setTelephone($inputData->telephone);
                $newTeacher->setNif($inputData->nif);
                $newTeacher->setEmail($inputData->email);
                $newTeacher->setPassword($inputData->password);

                if ( DAOTeacherImpl::insert($newTeacher) ){
                   http_response_code(200);
               }//end if
               else {
                   http_response_code(400);
               }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;

        // --------- TESTING READ METHODS WITH POSTMAN --------- //
        case 'GET':
            if ( isset( $_GET['email'] ) && isset( $_GET['password'] )){
                echo json_encode(DAOTeacherImpl::findByLogin($_GET['email'], $_GET['password']));
            }//end if
            else if( isset( $_GET['id'] ) ) {
                echo json_encode(DAOTeacherImpl::getOne($_GET['id']));
            }//end else if
            else {
                echo json_encode(DAOTeacherImpl::getAll());
            }//end else
            break;

        // -------- TESTING UPDATE METHODS WITH POSTMAN -------- //
        case 'PUT':
            $changedTeacher = new teacherEntity();
            $inputData = json_decode(file_get_contents('php://input'));

            if ( $inputData != NULL ) {

                $changedTeacher->setName($inputData->name);
                $changedTeacher->setSurname($inputData->surname);
                $changedTeacher->setTelephone($inputData->telephone);
                $changedTeacher->setNif($inputData->nif);
                $changedTeacher->setEmail($inputData->email);
                $changedTeacher->setPassword($inputData->password);

                if ( DAOTeacherImpl::update($inputData->id_teacher, $changedTeacher) ){
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;

        // -------- TESTING DELETE METHODS WITH POSTMAN -------- //
        case 'DELETE':
            if( isset( $_GET['id'] ) ) {
                if( DAOTeacherImpl::delete( $_GET['id'] ) ){
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;

        // ---------------------- DEFAULT ---------------------- //
        default:
            http_response_code(405);
            break;
    }//end while