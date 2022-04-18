<?php

session_start();
ob_start();

//DEPENDENCIES
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'controllers/routesController.php';
//require_once 'helpers/errorManager.php';

//VIEWS
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/aside.php';

showBeforeSession();

// ------------- MAIN VIEWS ------------- //

// --- ADMIN VIEWS --- //
    if( isset($_GET['btn-showCourseManager']) ){
        routesController::showCourseManager();
    }
    if( isset($_GET['btn-showTeacherManager']) ){
        routesController::showTeacherManager();
    }
    if(isset($_GET['btn-showClassManager'])){
        routesController::showClassManager();
    }

// --- TEACHER VIEWS --- //
    if(isset($_GET['btn-showClassList'])){
        routesController::showClassList();
    }
    if(isset($_GET['btn-showTeacherSchedule'])){
        routesController::showTeacherSchedule();
    }

// --- STUDENT VIEWS --- //
    if(isset($_GET['btn-showClassListAvailable'])){
        routesController::showClassListAvailable();
    }
    if(isset($_GET['btn-showStudentSchedule'])){
        routesController::showStudentSchedule();
    }

// --- SIGN OFF --- //
    if(isset($_GET['btn-singOff'])){
        ob_clean();
        ob_end_flush();
        loginController::logout();
    }

// ------------- END MAIN VIEWS ------------- //

//TODO: TERMINAR FUNCIÓN SHOW-SESSION.
function showBeforeSession() {
    //-------------------------------------------------//
    //SHOW IF YOU'RE IN TEACHER_MANAGER
    if ( isset( $_SESSION['teacherRegister'] ) ) {
        routesController::showTeacherManager();
        Utils::deleteSession('teacherRegister');
    }
    if ( isset( $_SESSION['teacherUpdate'] ) ) {
        routesController::showTeacherManager();
        Utils::deleteSession('teacherUpdate');
    }
    if ( isset( $_SESSION['teacherDelete'] ) ) {
        routesController::showTeacherManager();
        Utils::deleteSession('teacherDelete');
    }//END SHOW IF YOU'RE IN TEACHER_MANAGER

    //-------------------------------------------------//
    //SHOW IF YOU'RE IN CLASS_MANAGER
    if ( isset( $_SESSION['classRegister'] ) ) {
        routesController::showClassManager();
        Utils::deleteSession('classRegister');
    }
    if ( isset( $_SESSION['classUpdate'] ) ) {
        routesController::showClassManager();
        Utils::deleteSession('classUpdate');
    }
    if ( isset( $_SESSION['classDelete'] ) ) {
        routesController::showClassManager();
        Utils::deleteSession('classDelete');
    }//END SHOW IF YOU'RE IN CLASS_MANAGER

    //-------------------------------------------------//
    //SHOW IF YOU'RE IN COURSE_MANAGER
    if ( isset( $_SESSION['addCourse'] ) ) {
        routesController::showCourseManager();
        Utils::deleteSession('addCourse');
    }
    if ( isset( $_SESSION['courseUpdate'] ) ) {
        routesController::showCourseManager();
        Utils::deleteSession('courseUpdate');
    }
    if ( isset( $_SESSION['courseDelete'] ) ) {
        routesController::showCourseManager();
        Utils::deleteSession('courseDelete');
    }//END SHOW IF YOU'RE IN COURSE_MANAGER

    //-------------------------------------------------//
    //SHOW IF YOU'RE IN STUDENT_MANAGER
    if ( isset( $_SESSION['courseEnrollment'] ) ) {
        routesController::showClassListAvailable();
        Utils::deleteSession('courseEnrollment');
    }
    if ( isset( $_SESSION['unEnrollment'] ) ) {
        routesController::showClassListAvailable();
        Utils::deleteSession('unEnrollment');
    }//END SHOW IF YOU'RE IN COURSE_MANAGER


}

require_once 'views/layout/footer.php';