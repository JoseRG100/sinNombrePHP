<?php

session_start();

//DEPENDENCIES
require_once '../autoload.php';
require_once '../config/db.php';
require_once '../config/parameters.php';
require_once '../helpers/utils.php';

//VIEWS
require_once 'layout/header.php';
require_once 'layout/navbar.php';
require_once 'layout/aside.php';

//REQUIRED VIEWS
if(isset($_POST['btn-addNewSubject'])){
    require_once 'admin/adminSubjectList.php';
}
if(isset($_POST['btn-addNewTeacher'])){
    require_once 'admin/adminTeacherList.php';
}
if(isset($_POST['btn-addNewClass'])){
    require_once 'admin/adminClassList.php';
}
if(isset($_POST['btn-teacherClassList'])){
    require_once 'teacher/teacherClassList.php';
}
if(isset($_POST['btn-studentClassList'])){
    require_once 'usuario/studentClassList.php';
}
if(isset($_POST['btn-schedule'])){
    require_once 'usuario/schedule.php';
}
if(isset($_POST['btn-singOff'])){
    //TODO: AQUI MANEJAMOS EL CIERRE DE SESSIÓN.
}

require_once 'layout/footer.php';