<?php

class usuario {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_user_admin;
    private $username;
    private $name;
    private $email;
    private $password;
    private $rol;
    private $db;

    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct(){
        $this->db = Database::connect();
    }

    // ------------------------------- GETTERS & SETTERS -------------------------------- //
    public function getId_user_admin() {
        return $this->id_user_admin;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    
    public function getRol() {
        return $this->rol;
    }

    public function setId_user_admin($id_user_admin): void {
        $this->id_user_admin = $id_user_admin;
    }

    public function setUsername($username): void {
        $this->username = $this->db->real_escape_string($username);
    }

    public function setName($name): void {
        $this->name = $this->db->real_escape_string($name);
    }

    public function setEmail($email): void {
        $this->email = $this->db->real_escape_string($email);
    }

    public function setPassword($password): void {
        $this->password = $password;
    }
    
    public function setRol($rol): void {
        $this->rol = $this->db->real_escape_string($rol);
    }

    public function getDb(): mysqli {
        return $this->db;
    }

    public function setDb(): void {
        $this->db = Database::connect();
    }



    // ------------------------------ MODEL METHODES ------------------------------ //
    public function save(){
        $sql = "INSERT INTO users_admin VALUES(NULL, '{$this->getUsername()}', '{$this->getName()}', '{$this->getEmail()}', '{$this->getPassword()}')";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    /**
     * Login methode to userAdmin.
     * @param $loginEmail
     * @param $logginPassword
     * @return false|object|stdClass|null
     */
    public static function login($loginEmail, $loginPassword){
        $foundUser = false;
        $dbConnection = Database::connect();
        $SQL = "SELECT * FROM users_admin WHERE email = '$loginEmail'";

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