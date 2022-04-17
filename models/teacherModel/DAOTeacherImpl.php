<?php

class DAOTeacherImpl implements DAOinterface {

    public static function insert($newObject) {

        $db     = Database::connect();

        //ENCRYPT PASSWORD
        $password = $newObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //END ENCRYPT PASSWORD

        $query  = "INSERT INTO teachers (id_teacher, name, surname, telephone, nif, email, password)
                   VALUES (NULL, '{$newObject->getName()}', '{$newObject->getSurname()}', '{$newObject->getTelephone()}', '{$newObject->getNif()}', '{$newObject->getEmail()}', '{$password}')";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;
        //END OF VALIDATION

    }//end insert

    public static function findByLogin($loginEmail, $loginPassword) {

        $foundUser  = false;
        $db         = Database::connect();
        $query      = "SELECT * FROM teachers WHERE email='$loginEmail'";
        $login = $db->query($query);

        if( $login->num_rows ){
            $probablyUser = $login->fetch_object();

            //VERIFYING THE PASSWORD IS RIGHT
            $verify = password_verify($loginPassword, $probablyUser->password);
            if( $verify ) {
                $foundUser = $probablyUser;
            }//end if

        }//end if

        return $foundUser;

    }//end findByLogin

    public static function getOne($objectId) {

        $db     = Database::connect();
        $query  = "SELECT * FROM teachers WHERE id_teacher=$objectId";
        return $db->query($query);

    }//end getOne

    public static function getOneToObject($objectId) {

        $db     = Database::connect();
        $query  = "SELECT * FROM teachers WHERE id_teacher=$objectId";
        $result = $db->query($query);

        $findTeacher = new teacherEntity();

        if( $result ) {
            while( $row = $result->fetch_assoc() ) {
                $findTeacher->setIdTeacher($row['id_teacher']);
                $findTeacher->setName($row['name']);
                $findTeacher->setSurname($row['surname']);
                $findTeacher->setTelephone($row['telephone']);
                $findTeacher->setNif($row['nif']);
                $findTeacher->setEmail($row['email']);
                $findTeacher->setPassword($row['password']);    //TODO: SE TIENE QUE DESENCRIPTAR
            } //end while
            
            return $findTeacher;

        }//end if

        return false;

    }//end getOneToObject

    public static function getAll() {

        $db     = Database::connect();
        $query  = "SELECT * FROM teachers";
        return $db->query($query);

//      NOTA: NO ELIMINAR, NO SABEMOS SI NECESITAREMOS TRANSFORMAR LOS REGISTROS EN OBJETOS MÁS ADELANTE
//            $data  = array();
//
//            if( $result->num_rows ) {
//                while( $row = $result->fetch_assoc() ) {
//                    $data[] = [
//                        'id_teacher' => $row['id_teacher'],
//                        'name' => $row['name'],
//                        'surname' => $row['surname'],
//                        'telephone' => $row['telephone'],
//                        'nif' => $row['nif'],
//                        'email' => $row['email'],
//                        'password' => $row['password'],
//                    ];
//                } //end while
//                return $data;
//            }//end if

//        return $result;

    }//end getAll

    public static function update($objectId, $changedObject) {

        $db     = Database::connect();

        $query  = "UPDATE teachers SET
                   name      = '{$changedObject->getName()}', 
                   surName   = '{$changedObject->getSurname()}', 
                   telephone = '{$changedObject->getTelephone()}', 
                   nif       = '{$changedObject->getNif()}', 
                   email     = '{$changedObject->getEmail()}', 
                   password  = '{$changedObject->getPassword()}'
                   WHERE id_teacher = $objectId";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;

    }//end update

    public static function delete($objectId) {
        $db     = Database::connect();
        $query  = "DELETE FROM teachers WHERE id_teacher=$objectId";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;

    }//end delete

}//end classManager DAOTeacherImpl