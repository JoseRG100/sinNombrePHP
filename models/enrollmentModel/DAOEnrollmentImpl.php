<?php

class DAOEnrollmentImpl implements DAOinterface {

    public static function insert($newObject)
    {
        $db     = Database::connect();

        //ENCRYPT PASSWORD
       // $password = $newObject->getPassword();
        //$password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //END ENCRYPT PASSWORD

        $query  = "INSERT INTO enrollment (id_enrollment, id_student, id_class, status)
                   VALUES (NULL, '{$newObject->getIdStudent()}', '{$newObject->getIdClass()}', '{$newObject->getStatus()}')";
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
        // [THIS METHODE IS INNECESARY TO THIS PROJECT]
    }

    public static function getOne($objectId)
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM enrollment WHERE id_enrollment=$objectId";
        return $db->query($query);
    }

    public static function getOneToObject($objectId) {

        $db     = Database::connect();
        $query  = "SELECT * FROM enrollment WHERE id_enrollment=$objectId";
        $result = $db->query($query);

        $findEnrollment = new enrollmentEntity();

        if( $result ) {
            while( $row = $result->fetch_assoc() ) {
                $findEnrollment->setIdEnrollment($row['id_enrollment']);
                $findEnrollment->setIdStudent();e($row['id_student']);
                $findEnrollment->setIdCourse($row['id_Course']);
                $findEnrollment->setStatus($row['status']);

            } //end while

            return $findEnrollment;

        }//end if

        return false;

    }//end getOneToObject

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
        $db     = Database::connect();
        $query  = "DELETE FROM enrollment WHERE id_enrollment=$objectId";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;

    }//end delete

}//end classManager DAOEnrollmentImpl

