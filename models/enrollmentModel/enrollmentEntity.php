<?php

class enrollmentEntity {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_enrollment;
    private $id_student;
    private $id_course;
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