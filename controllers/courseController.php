<?php
require_once 'models/courseModel/courseEntity.php';
require_once 'models/courseModel/DAOcourseImpl.php';

//TODO: PASAR TODAS ESTAS FUNCIONES A LA CLASE "COURSECONTROLLER" Y ELIMINAR ESTA CLASE
class courseController {
    //CREO QUE ESTA FUNCIÓN SOLO SE USA EN LOS USUARIOS
    //public function index(){
    //    require_once 'views/asignatura/destacados.php';
    //}
    
    public function gestion(){
        Utils::isAdmin();
        
        $asignatura = new courseEntity();
        $asignaturas = $asignatura->getAll();
        
        require_once 'views/admin/courseManager/adminCourseList.php';
    }

    /*
    public function crear(){
        Utils::isAdmin();
        require_once 'views/admin/courseManager/addNewCourse.php';
    }
    */
    
    public function save(){
        Utils::isAdmin();    
        if(isset($_POST)){
            $name = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $description = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $date_start = isset($_POST['empieza']) ? $_POST['empieza'] : false;
            $date_end = isset($_POST['acaba']) ? $_POST['acaba'] : false;
            $active = isset($_POST['activo']) ? $_POST['activo'] : false;
            
            if($name && $description && $date_start && $date_end && $active){
                $asignatura = new courseEntity();
                $asignatura->setName($name);
                $asignatura->setDescription($description);
                $asignatura->setDate_start($date_start);
                $asignatura->setDate_end($date_end);
                $asignatura->setActive($active);
                
                $save = $asignatura->save();
                    if($save){
                    $_SESSION['asignatura'] = "complete";
                    }else{
                        $_SESSION['asignatura'] = "failed";
                    }
            }else{
                $_SESSION['asignatura'] = "failed";
            }
            }else{
                $_SESSION['asignatura'] = "failed";
            
        }
        header('Location:'.base_url.'/course/gestion');
        
    }
    
}