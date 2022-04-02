<?php

class teacherModel {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_teacher;
    private $name;
    private $surname;
    private $telephone;
    private $nif;
    private $email;
    private $password;
    private $db;

    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct() {
        $this->db = Database::connect();
    }

    // ------------------------------- GETTERS & SETTERS -------------------------------- //
    public function getIdTeacher() {
        return $this->id_teacher;
    }

    function setIdTeacher($id_teacher): void {
        $this->id_teacher = $id_teacher;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname): void {
        $this->surname = $surname;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone): void {
        $this->telephone = $telephone;
    }

    public function getNif() {
        return $this->nif;
    }

    public function setNif($nif): void {
        $this->nif = $nif;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }



    // ------------------------------ MODEL METHODES ------------------------------ //

    public function signUp(){
        $sql = "INSERT INTO teachers VALUES(NULL, '{$this->getName()}', '{$this->getSurname()}', '{$this->getTelephone()}', '{$this->getNif()}', '{$this->getEmail()}', '{$this->getPassword()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    /**
     * Login methode to teacher.
     * @param $loginEmail
     * @param $logginPassword
     * @return false|object|stdClass|null
     */
    public static function login($loginEmail, $loginPassword){
        $foundUser = false;
        $dbConnection = Database::connect();
        $SQL = "SELECT * FROM teachers WHERE email = '$loginEmail'";

        //LOOK FOR THE USER IN THE DATABASE
        //TODO: Hay que crear una validación, para que solo se pueda añadir un usuario por EMAIL

        $login = $dbConnection->query($SQL);

        if($login && $login->num_rows == 1){
            $probablyUser = $login->fetch_object();

            //VERIFYING THE PASSWORD IS RIGHT
            $verify = password_verify($loginPassword, $probablyUser->password);
            if($verify){ $foundUser = $probablyUser; }

        }

        mysqli_close($dbConnection);
        return $foundUser;
    }

}