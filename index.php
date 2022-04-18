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
require_once 'views/login.php';
require_once 'helpers/errorManager.php';

//AUTO-OPEN SESSION
/** THIS FUNCTION RE-OPEN A SESSION IF YOU DON'T LOG-OUT
 *  YOUR SESSION PREVIOUSLY (ALWAYS THAT THE SESSION EXISTS
 *  INTO THE CACHE NAVIGATOR)
 */
if ( isset($_SESSION['identity'])) {
    autoOpenSession();
}

function autoOpenSession(){
    //OPEN ADMIN SESSION
    /*
    if ( isset($_SESSION['admin']) && $_SESSION['admin'] ) {
        Utils::isAdmin();
        header("Location:".base_url.'/home.php');
    }

    //OPEN TEACHER SESSION
    if ( isset($_SESSION['teacher']) && $_SESSION['teacher'] ) {
        Utils::isTeacher();
        header("Location:".base_url.'/home.php');
    }
    //OPEN STUDENT SESSION
    if ( isset($_SESSION['student']) && $_SESSION['student'] ) {
        Utils::isStudent();
        header("Location:".base_url.'/home.php');
    }
    */
}
//END AUTO-OPEN SESSION

require_once 'views/layout/footer.php';