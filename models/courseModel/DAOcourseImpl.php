<?php

class DAOcourseImpl implements DAOinterface {

    public static function insert($newObject)
    {

        /*$db     = Database::connect();

        //ENCRYPT PASSWORD
        $password = $newObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //END ENCRYPT PASSWORD



        $query  = "INSERT INTO courses (id_course, name, description, date_start, date_end, active)
                   VALUES (NULL, '{$newObject->getName()}', '{$newObject->getDescription()}', '{$newObject->getDate_start()}', '{$newObject->getDate_end()}', '{$newObject->getActive()}')";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;
        //END OF VALIDATION*/

    }//end insert

    public static function findByLogin($loginEmail, $loginPassword)
    {

        $foundUser  = false;
        $db         = Database::connect();
        $query      = "SELECT * FROM courses WHERE email='$loginEmail'";
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

    public static function getOne($objectId)
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM courses WHERE id_course=$objectId";
        return $result = $db->query($query);
    }

    public static function getAll()
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM courses";
        return $result = $db->query($query);
    }

    public static function update($objectId, $changedObject)
    {
        $db     = Database::connect();

        //-------- ENCRYPT PASSWORD -------- //
        $password = $changedObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //------- /ENCRYPT PASSWORD -------- //

        $query  = "UPDATE course SET
                   name      = '{$changedObject->getName()}', 
                   description   = '{$changedObject->getDescription()}', 
                   date_start = '{$changedObject->getDate_start()}', 
                   date_end       = '{$changedObject->getDate_end()}', 
                   active     = '{$changedObject->getActive()}'
                   
                   WHERE id_course = $objectId";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;

    }//end update


    public static function delete($objectId)
    {

        $db     = Database::connect();
        $query  = "DELETE FROM courses WHERE id_course=$objectId";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;

    }//end delete
}