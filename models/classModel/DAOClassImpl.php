<?php

class DAOClassImpl implements DAOinterface
{


    public static function insert($newObject)
    {

        $db = Database::connect();


        //-------- ENCRYPT PASSWORD -------- //
        //$password = $newObject->getPassword();

       // $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);



        //------- /ENCRYPT PASSWORD -------- //



        $query = "INSERT INTO class (id_class, id_teacher, id_course , name, color)
                   VALUES (NULL, '{$newObject->getIdTeacher()}', '{$newObject->getIdCourse()}', '{$newObject->getName()}', '{$newObject->getColor()}')";
        $result = $db->query($query);


        //VALIDATING THE METHODE
        if ( !$result ) {
            return FALSE;
        } //end if
        return TRUE;

    }//end insert

    public static function findByLogin($loginEmail, $loginPassword)
    {

        //  THIS FUNCTION IT'S NOT NECESSARY

    }//end findByLogin

    public static function getOne($objectId)
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM class WHERE id_class=$objectId";
        return $result = $db->query($query);
    }//end getOne

    public static function getAll()
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM class";
        return $result = $db->query($query);
    }//end getAll

    public static function update($objectId, $changedObject)
    {
        $db     = Database::connect();

        //-------- ENCRYPT PASSWORD -------- //
        //$password = $changedObject->getPassword();
        //$password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //------- /ENCRYPT PASSWORD -------- //

        $query  = "UPDATE class SET
                   id_teacher      = '{$changedObject->getIdTeacher()}', 
                   id_course   = '{$changedObject->getIdCourse()}',                    
                   name       = '{$changedObject->getName()}', 
                   color     = '{$changedObject->getColor()}'
                   
                   WHERE id_class = $objectId";
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
        $query  = "DELETE FROM class WHERE id_class=$objectId";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;
    }//end delete

}//end classManager DAOStudentImpl