<?php
require_once 'models/curso.php';
class cursoController{
    public function index(){
        Utils::isAdmin();
        $curso = new Curso();
        $cursos = $curso->getAll();
        
        require_once 'views/curso/index.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/curso/crear.php';
    }
    
    public function save(){
           Utils::isAdmin();
           //guardar la caegoria enla base de datos
       if(isset($_POST) && isset($_POST['name'])){        
        $curso = new Curso();
        $curso->setName($_POST['name']);
        $curso->save();
        }
           
           header("Location:".base_url."curso/index");
    }
}