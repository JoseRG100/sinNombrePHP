<?php
require_once 'models/asignatura.php';

//TODO: PASAR TODAS ESTAS FUNCIONES A LA CLASE "COURSECONTROLLER" Y ELIMINAR ESTA CLASE
class asignaturaController {
    //CREO QUE ESTA FUNCIÓN SOLO SE USA EN LOS USUARIOS
    //public function index(){
    //    require_once 'views/asignatura/destacados.php';
    //}
    
    public function gestion(){
        Utils::isAdmin();
        
        $asignatura = new Asignatura();
        $asignaturas = $asignatura->getAll();
        
        require_once 'views/asignatura/gestion.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/asignatura/crear.php';
    }
    
    public function save(){
        Utils::isAdmin();    
        if(isset($_POST)){
            $name = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $description = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $date_start = isset($_POST['empieza']) ? $_POST['empieza'] : false;
            $date_end = isset($_POST['acaba']) ? $_POST['acaba'] : false;
            $active = isset($_POST['activo']) ? $_POST['activo'] : false;
            
            if($nombre && $descripcion && $empieza && $acaba && $activo){
                $asignatura = new Asignatura();
                $asignatura->setName($name);
                $asignatura->setDescription($description);
                $asignatura->setDate_start($date_start);
                $asignatura->setDate_end($date_end);
                $asignatura->setActive($active);
                
                $save = $producto->save();
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
        header('Location:'.base_url.'asignatura/gestion');
        
    }
    
}