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

// ------------- MAIN VIEWS ------------- //

//TODO: CREAR FUNCIÓN "CHANGE SESSION".
//$_SESSION['current_session'] = null;
$one    = 1;
$two    = 2;

//showSession();

function changeSession($chosenSession) {
    //echo $chosenSession;
    $_SESSION['current_session'] = $chosenSession;
    //echo $_SESSION['current_session'];
}

/*
function showSession() {

    if ( !isset( $_SESSION['current_session'] ) ) {
        $_SESSION['current_session'] = null;
    }
    else if ( ( $_SESSION['current_session'] ) == null ) {
        //VOID
    }
    if ( $_SESSION['current_session'] == 1 ) {
        routesController::showCourseManager();

    }     else {
        //VOID
    }
    if ( $_SESSION['current_session'] == 2 ) {
        routesController::showTeacherManager();

    }  else {
        //VOID
    }

    Utils::deleteSession('current_session');

}
*/

//TODO: MODULARIZAR DENTRO DEL ROUTES CONTROLLER

// --- ADMIN VIEWS --- //
    if( isset($_GET['btn-showCourseManager']) || ( isset($_SESSION['current_session']) && $_SESSION['current_session'] == 1 ) ){
        routesController::showCourseManager();

        //$_SESSION['view_course_manager'] = true;
        changeSession($one);
        //Utils::deleteSession('view_course_manager');
    }
    if( isset($_GET['btn-showTeacherManager']) || ( isset($_SESSION['current_session']) && $_SESSION['current_session'] == 2 ) ){
        routesController::showTeacherManager();

        //$_SESSION['view_teacher_manager'] = true;
        changeSession($two);
        //Utils::deleteSession('view_teacher_manager');
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
        loginController::logout();
    }

// ------------- END MAIN VIEWS ------------- //

require_once 'views/layout/footer.php';