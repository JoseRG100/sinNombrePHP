<?php

class DAOEnrollmentImpl implements DAOinterface {

    public static function insert($newObject)
    {
        $db     = Database::connect();

        //ENCRYPT PASSWORD
       // $password = $newObject->getPassword();
        //$password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //END ENCRYPT PASSWORD

        $query  = "INSERT INTO enrollment (id_enrollment, id_student, id_course, status)
                   VALUES (NULL, '{$newObject->getIdStudent()}', '{$newObject->getIdCourse()}', '{$newObject->getStatus()}'";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;
        //END OF VALIDATION

    }//end insert

    public static function findByLogin($loginEmail, $loginPassword)
    {
        // TODO: Implement findByLogin() method.
    }

    public static function getOne($objectId)
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM enrollment WHERE id_enrollment=$objectId";
        return $db->query($query);
    }

    public static function getAll()
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM enrollment";
        return $db->query($query);
    }

    public static function update($objectId, $changedObject)
    {
        // TODO: Implement update() method.
    }

    public static function delete($objectId)
    {
        // TODO: Implement delete() method.
    }
}