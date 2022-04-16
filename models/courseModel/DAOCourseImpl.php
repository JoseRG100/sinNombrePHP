<?php

class DAOCourseImpl implements DAOinterface {

    public static function insert($newObject) {

        $db     = Database::connect();
        $date_start  = date('Y-m-d', strtotime( $newObject->getDateStart() ));
        $date_end    = date('Y-m-d', strtotime( $newObject->getDateEnd() ));

        $query = "INSERT INTO courses VALUES(NULL, '{$newObject->getName()}', '{$newObject->getDescription()}', '$date_start', '$date_end', {$newObject->getActive()})";
        $result = $db->query($query);

        //VALIDATING THE METHODE
        if( !$result ) {
            return FALSE;
        } //end if
        return TRUE;
        //END OF VALIDATION

    }//end insert

    public static function findByLogin($loginEmail, $loginPassword) {
        //[THIS METHODE IS UNNECESSARY]
    }//end findByLogin

    public static function getOne($objectId) {
        $db     = Database::connect();
        $query  = "SELECT * FROM courses WHERE id_course=$objectId";
        return $db->query($query);
    }//end getOne

    public static function getAll() {
        $db     = Database::connect();
        $query  = "SELECT * FROM courses ORDER BY id_course DESC";
        return $db->query($query);
    }//end getAll

    public static function update($objectId, $changedObject) {

        $db     = Database::connect();
        $date_start  = date('Y-m-d', strtotime( $changedObject->getDateStart() ));
        $date_end    = date('Y-m-d', strtotime( $changedObject->getDateEnd() ));

        $query  = "UPDATE courses SET
                   name         = '{$changedObject->getName()}', 
                   description  = '{$changedObject->getDescription()}', 
                   date_start   = '$date_start', 
                   date_end     = '$date_end', 
                   active       = '{$changedObject->getActive()}'
                   WHERE id_course = $objectId";

        $result = $db->query($query);

        //VALIDATING THE METHODE
        if( !$result ) {
            return FALSE;
        } //end if
        return TRUE;
        //END OF VALIDATION

    }//end update

    public static function delete($objectId) {

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