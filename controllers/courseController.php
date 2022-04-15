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
                        $_SESSION['addCourse'] = "complete";
                        $_SESSION['message'] = 'Se ha creado un nuevo curso exitosamente';
                    }else{
                        $_SESSION['addCourse'] = "failed";
                        $_SESSION['message'] = 'La QUERY no ha ingresado a la BBDD';
                    }
            }else{
                $_SESSION['addCourse'] = "failed";
                $_SESSION['message'] = 'Los datos del metodos POST no han entrado correctamente a la funcion';
            }
        }else{
            $_SESSION['addCourse'] = "failed";
            $_SESSION['message'] = 'El metodo POST no ha ingresado correctamete';
        }

        header('Location:'.base_url.'/home');
        
    }
    
}