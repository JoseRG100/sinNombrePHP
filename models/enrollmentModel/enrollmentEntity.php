<?php

class enrollmentEntity {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_enrollment;
    private $id_student;
    private $id_class;
    private $status;

    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct() {
    }

    // ------------------------------- GETTERS & SETTERS -------------------------------- //
    /**
     * @return mixed
     */
    public function getIdEnrollment()
    {
        return $this->id_enrollment;
    }

    /**
     * @param mixed $id_enrollment
     */
    public function setIdEnrollment($id_enrollment): void
    {
        $this->id_enrollment = $id_enrollment;
    }

    /**
     * @return mixed
     */
    public function getIdStudent()
    {
        return $this->id_student;
    }

    /**
     * @param mixed $id_student
     */
    public function setIdStudent($id_student): void
    {
        $this->id_student = $id_student;
    }

    /**
     * @return mixed
     */
    public function getIdClass()
    {
        return $this->id_class;
    }

    /**
     * @param mixed $id_class
     */
    public function setIdClass($id_class): void
    {
        $this->id_class = $id_class;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }


}//end enrollmentEntity