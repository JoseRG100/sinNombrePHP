<?php

class studentEntity {
    // ------------------------------------ ATTRIBUTES ------------------------------------- //
    private $id;
    private $username;
    private $password;
    private $email;
    private $name;
    private $surname;
    private $telephone;
    private $nif;
    private $date_registered;


    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct(){
    }

    // ------------------------------- GETTERS & SETTERS -------------------------------- //

    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email): void {
        $this->email = $email;
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

    public function getDateRegistered() {
        return $this->date_registered;
    }

    public function setDateRegistered($date_registered): void {
        $this->date_registered = $date_registered;
    }

    // ------------------------------ MODEL METHODES ------------------------------ //

}