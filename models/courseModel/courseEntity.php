<?php

class courseEntity {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_course;
    private $name;
    private $description;
    private $date_start;
    private $date_end;
    private $active;
    private $db;

    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct(){
    }

    // ------------------------------- GETTERS & SETTERS -------------------------------- //
    /**
     * @return mixed
     */
    public function getIdCourse()
    {
        return $this->id_course;
    }

    /**
     * @param mixed $id_course
     */
    public function setIdCourse($id_course): void
    {
        $this->id_course = $id_course;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * @param mixed $date_start
     */
    public function setDateStart($date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * @param mixed $date_end
     */
    public function setDateEnd($date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db): void
    {
        $this->db = $db;
    }

    // ------------------------------ MODEL METHODES ------------------------------ //

} //end courseEntity