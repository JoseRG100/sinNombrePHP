<?php

class teacherEntity {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_teacher;
    private $name;
    private $surname;
    private $telephone;
    private $nif;
    private $email;
    private $password;

    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct() {
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

}//end classManager teacherEntity