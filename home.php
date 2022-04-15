<?php

session_start();
ob_start();

//DEPENDENCIES
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'controllers/routesController.php';

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
    }

}


require_once 'views/layout/footer.php';