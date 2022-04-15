<?php

require_once 'models/DAOinterface.php';
require_once 'controllers/loginController.php';
require_once 'controllers/teacherController.php';


/**
 * ALL THE LINKS THAT ENRUTING THE DIFFERENT URL's
 * ON THE VIEWS ARE HERE.
 */
class routesController {

    // --- MAIN VIEWS --- //
    public static function index(){
        require_once 'index.php';
    }

    public static function home(){
        require_once 'home.php';
    }

    public static function showProfile(){
        require_once 'views/profile.php';
    }

    // --- ADMIN VIEWS --- //
    public static function showCourseManager(){
        require_once 'views/admin/courseManager/addNewCourse.php';
        require_once 'views/admin/courseManager/adminCourseList.php';
    }

    public static function showTeacherManager(){
        require_once 'views/admin/teacherManager/adminTeacherList.php';
        require_once 'views/admin/teacherManager/addNewTeacher.php';
        require_once 'views/admin/teacherManager/updateTeacher.php';
    }

    public static function showClassManager(){
        require_once 'views/admin/adminClassList.php';
    }

    // --- TEACHER VIEWS --- //
    public static function showClassList(){
        require_once 'views/teacher/teacherClassList.php';
    }

    public static function showTeacherSchedule(){
        require_once 'views/teacher/teacherSchedule.php';
    }

    // --- STUDENT VIEWS --- //
    public static function showStudentRegister(){
        require_once 'views/student/studentRegister.php';
    }

    public static function showClassListAvailable(){
        require_once 'views/student/studentClassList.php';
    }

    public static function showStudentSchedule(){
        require_once 'views/student/studentSchedule.php';
    }

}