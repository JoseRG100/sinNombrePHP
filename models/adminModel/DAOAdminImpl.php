<?php

class DAOAdminImpl implements DAOinterface {

    public static function insert($newObject) {

        $db     = Database::connect();

        //-------- ENCRYPT PASSWORD -------- //
        $password = $newObject->getPassword();
        $password = password_hash($db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        //------- /ENCRYPT PASSWORD -------- //

        $query  = "INSERT INTO users_admin (id_user_admin, username, name, email, password)
                   VALUES (NULL, '{$newObject->getUsername()}', '{$newObject->getName()}', '{$newObject->getEmail()}', '{$password}')";
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
        $query      = "SELECT * FROM users_admin WHERE email='$loginEmail'";
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
        //[THIS FUNCTION IT'S NOT NECESSARY YET]
    }//end getOne

    public static function getAll() {
        //[THIS FUNCTION IT'S NOT NECESSARY YET]
    }//end getAll

    public static function update($objectId, $changedObject) {
        //[THIS FUNCTION IT'S NOT NECESSARY YET]
    }//end update

    public static function delete($objectId) {
        //[THIS FUNCTION IT'S NOT NECESSARY YET]
    }//end delete

}//end classManager DAOTeacherImpl