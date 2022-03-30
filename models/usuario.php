<?php

class usuario{
    //ATRIBUTES
    private $id_user_admin;
    private $username;
    private $name;
    private $email;
    private $password;
    private $rol;
    private $db;

    //CONSTRUCTOR
    public function __construct(){
        $this->db = Database::connect();
    }

    //GETTERS & SETTERS
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

    //MODEL METHODES
    public function save(){
        $sql = "INSERT INTO users_admin VALUES(NULL, '{$this->getUsername()}', '{$this->getName()}', '{$this->getEmail()}', '{$this->getPassword()}')";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        //Comprobar si existe el usuario
        $sql = "SELECT * FROM users_admin WHERE email = '$email'";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            
            //verificar la contraseña
            $verify = password_verify($password, $usuario->password);
            
            if($verify){
                $result = $usuario;
            }
        }
        return $result;
    }
}
