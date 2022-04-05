<?php

class adminEntity {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_user_admin;
    private $username;
    private $name;
    private $email;
    private $password;

    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct(){
    }

    // ------------------------------- GETTERS & SETTERS -------------------------------- //

    public function getIdUserAdmin() {
        return $this->id_user_admin;
    }

    public function setIdUserAdmin($id_user_admin): void {
        $this->id_user_admin = $id_user_admin;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name): void {
        $this->name = $name;
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

}