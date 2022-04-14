<?php

session_start();

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
showSession();

//function changeSession($chosenSession) {
//    $_SESSION['current_session'] = $chosenSession;
//}

function showSession() {
    if ( isset($_SESSION['view_teacher_manager'])) {
        routesController::showTeacherManager();
        //TODO: CAMBIAR LA SIGUIENTE LINEA POR LA FUNCIÓN "CHANGE SESSION".
        Utils::deleteSession('view_teacher_manager');
    }
}


//TODO: MODULARIZAR DENTRO DEL ROUTES CONTROLLER

// --- ADMIN VIEWS --- //
    if(isset($_POST['btn-showCourseManager'])){
        routesController::showCourseManager();
    }
    if(isset($_POST['btn-showTeacherManager'])){
        routesController::showTeacherManager();
        $_SESSION['view_teacher_manager'] = true;
        //changeSession($_SESSION['view_teacher_manager']);
    }
    if(isset($_POST['btn-showClassManager'])){
        routesController::showClassManager();
    }

// --- TEACHER VIEWS --- //
    if(isset($_POST['btn-showClassList'])){
        routesController::showClassList();
    }
    if(isset($_POST['btn-showTeacherSchedule'])){
        routesController::showTeacherSchedule();
    }

// --- STUDENT VIEWS --- //
    if(isset($_POST['btn-showClassListAvailable'])){
        routesController::showClassListAvailable();
    }
    if(isset($_POST['btn-showStudentSchedule'])){
        routesController::showStudentSchedule();
    }

// --- SIGN OFF --- //
    if(isset($_POST['btn-singOff'])){
        loginController::logout();
    }

// ------------- END MAIN VIEWS ------------- //

require_once 'views/layout/footer.php';