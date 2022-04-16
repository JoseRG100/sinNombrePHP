<?php
require_once 'models/courseModel/courseEntity.php';
require_once 'models/courseModel/DAOcourseImpl.php';

//TODO: PASAR TODAS ESTAS FUNCIONES A LA CLASE "COURSECONTROLLER" Y ELIMINAR ESTA CLASE
class courseController {

    public function actionDefault(){
        Utils::showError();
    }

    public function gestion(){
        Utils::isAdmin();
        
        $asignatura = new courseEntity();
        $asignaturas = $asignatura->getAll();
        
        require_once 'views/admin/courseManager/adminCourseList.php';
    }
    
    public function save(){
        Utils::isAdmin();    
        if(isset($_POST)){

            $name        = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $description = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $date_start  = isset($_POST['empieza']) ? $_POST['empieza'] : false;
            $date_end    = isset($_POST['acaba']) ? $_POST['acaba'] : false;
            $active      = isset($_POST['activo']) ? $_POST['activo'] : false;
            
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

    public function update(){

        Utils::isAdmin();
        if(isset($_POST)){

            $id_course = isset($_POST['id_course']) ? $_POST['id_course'] : false;
            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $description    = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $date_start  = isset($_POST['date_start']) ? $_POST['date_start'] : false;
            $date_end        = isset($_POST['date_end']) ? $_POST['date_end'] : false;
            $active      = isset($_POST['active']) ? $_POST['active'] : false;



            if( $id_course && $name && $description && $date_start && $date_end && $active){
                $changedCourse = new courseEntity();
                $changedCourse->setName($name);
                $changedCourse->setDescription($description);
                $changedCourse->setDate_start($date_start);
                $changedCourse->setDate_end($date_end);
                $changedCourse->setActive($active);

                $updateSuccessful = DAOCourseImpl::update($id_course, $changedCourse);

                if( $updateSuccessful ){

                    $_SESSION['courseUpdate']  = "complete";
                    $_SESSION['message']        = 'Asignatura, actualizada correctamente.';
                    header("Location:".base_url.'/home');

                }else{
                    $_SESSION['courseUpdate'] = "failed";
                    $_SESSION['message'] = 'Error. El registro no pudo ingresar a la BBDD';
                    header("Location:".base_url.'/home');

                }

            }else{
                $_SESSION['courseUpdate'] = "failed";
                $_SESSION['message'] = 'Error. Uno de los datos no se capturó correctamente';
                header("Location:".base_url.'/home');
            }

        }else{
            $_SESSION['courseUpdate'] = "failed";
            $_SESSION['message'] = 'Error. La solicitud REST no fue enviada correctamente';
            header("Location:".base_url.'/home');
        }

    }

    public function delete(){

        Utils::isAdmin();
        if( isset( $_GET['id'] ) ) {
            $id_course = $_GET['id'];
            $deleteSuccessful = DAOCourseImpl::delete($id_course);

            if( $deleteSuccessful ){
                $_SESSION['courseDelete']  = "complete";
                $_SESSION['message']        = 'Asignatura, eliminada correctamente.';
                header("Location:".base_url.'/home');
            }else {
                $_SESSION['courseDelete'] = "failed";
                $_SESSION['message'] = 'Error. El registro no se encontró en la BBDD.';
                header("Location:".base_url.'/home');
            }

        }else {
            $_SESSION['courseDelete'] = "failed";
            $_SESSION['message'] = 'Error. Tipo de solicitud incorrectemante enviado.';
            header("Location:".base_url.'/home');
        }

    }

}