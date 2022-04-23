<?php

class DAOStudentImpl implements DAOinterface {

    public static function insert($newObject) {

        $db     = Database::connect();

        //-------- ENCRYPT PASSWORD -------- //
        $password = $newObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //------- /ENCRYPT PASSWORD -------- //

        $query  = "INSERT INTO students (id, username, password, email, name, surname, telephone, nif, date_registered)
                   VALUES (NULL, '{$newObject->getUsername()}', '{$password}', '{$newObject->getEmail()}', '{$newObject->getName()}', '{$newObject->getSurname()}', '{$newObject->getTelephone()}', '{$newObject->getNif()}', NULL)";
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
        $query      = "SELECT * FROM students WHERE email = '$loginEmail'";
        $login      = $db->query($query);

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
        //[THIS FUNCTION IT'S NOT NECESSARY YET]
    }//end getOne

    public static function getOneToObject($objectId) {

        $db     = Database::connect();
        $query  = "SELECT * FROM students WHERE id = $objectId";
        $result = $db->query($query);

        $findStudent = new studentEntity();

        if( $result ) {
            while( $row = $result->fetch_assoc() ) {
                $findStudent->setId($row['id']);
                $findStudent->setUsername($row['username']);
                $findStudent->setPassword($row['password']);
                $findStudent->setEmail($row['email']);
                $findStudent->setName($row['name']);
                $findStudent->setSurname($row['surname']);
                $findStudent->setTelephone($row['telephone']);
                $findStudent->setNif($row['nif']);
                $findStudent->setDateRegistered($row['date_registered']);
            } //end while

            return $findStudent;

        }//end if

        return false;

    }//end getOneToObject

    public static function getAll() {
        //[THIS FUNCTION IT'S NOT NECESSARY YET]
    }//end getAll

    public static function update($objectId, $changedObject) {
        $db     = Database::connect();

        //-------- ENCRYPT PASSWORD -------- //
        $password = $changedObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //------- /ENCRYPT PASSWORD -------- //

        $query  = "UPDATE students SET
                   username     = '{$changedObject->getUsername()}', 
                   email        = '{$changedObject->getEmail()}',                    
                   password     = '{$password}' 
                   WHERE id = $objectId";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;
    }//end update


    public static function delete($objectId) {
        //[THIS FUNCTION IT'S NOT NECESSARY YET]
    }//end delete

}//end classManager DAOStudentImpl