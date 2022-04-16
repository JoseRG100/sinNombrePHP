<?php

function show_error(){
    Utils::showError();
}

//¿ESTA FUNCIÓN SIRVE PARA NO USAR EL TERMINO CONTROLADOR?
if (isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
} elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
} else{
    show_error();
    exit();
}
//¿ESTA FUNCIÓN SIRVE PARA NO USAR EL TERMINO CONTROLADOR?

//ERROR MANAGER
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();    //ACTION DEFAULT = INDEX DE LOS CONTROLADORES.
    }else{
        show_error();
    }
}else{
    show_error();
} //END ERROR MANAGER
