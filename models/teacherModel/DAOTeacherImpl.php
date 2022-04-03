<?php
require_once 'models/DAOinterface.php';

class DAOTeacherImpl implements DAOinterface {

    public static function insert($newObject) {

        $db     = Database::connect();

        //-------- ENCRYPT PASSWORD -------- //
        $password = $newObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //------- /ENCRYPT PASSWORD -------- //

        $query  = "INSERT INTO teachers (id_teacher, name, surname, telephone, nif, email, password)
                   VALUES (NULL, '{$newObject->getName()}', '{$newObject->getSurname()}', '{$newObject->getTelephone()}', '{$newObject->getNif()}', '{$newObject->getEmail()}', '{$password}')";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;

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
        $result = $db->query($query);
        $data  = array();

        if( $result->num_rows ) {
            while( $row = $result->fetch_assoc() ) {
                $data[] = [
                    'id_teacher' => $row['id_teacher'],
                    'name'       => $row['name'],
                    'surname'    => $row['surname'],
                    'telephone'  => $row['telephone'],
                    'nif'        => $row['nif'],
                    'email'      => $row['email'],
                    'password'   => $row['password'],
                ];
            } //end while
            return $data;
        }//end if
        return $data;

    }//end getOne

    public static function getAll() {

        $db     = Database::connect();
        $query  = "SELECT * FROM teachers";
        $result = $db->query($query);
        $data  = array();

        if( $result->num_rows ) {
            while( $row = $result->fetch_assoc() ) {
                $data[] = [
                    'id_teacher' => $row['id_teacher'],
                    'name' => $row['name'],
                    'surname' => $row['surname'],
                    'telephone' => $row['telephone'],
                    'nif' => $row['nif'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                ];
            } //end while
            return $data;
        }//end if
        return $data;

    }//end getAll

    public static function update($objectId, $changedObject) {

        $db     = Database::connect();

        //-------- ENCRYPT PASSWORD -------- //
        $password = $changedObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //------- /ENCRYPT PASSWORD -------- //

        $query  = "UPDATE teachers SET
                   name      = '{$changedObject->getName()}', 
                   surName   = '{$changedObject->getSurname()}', 
                   telephone = '{$changedObject->getTelephone()}', 
                   nif       = '{$changedObject->getNif()}', 
                   email     = '{$changedObject->getEmail()}', 
                   password  = '{$password}'
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

}//end class DAOTeacherImpl