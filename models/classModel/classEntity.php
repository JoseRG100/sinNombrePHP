<?php

class classEntity{

    private $id_class;
    private $id_teacher;
    private $id_course;
    private $id_schedule;
    private $name;
    private $color;

    public function __construct(){
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
    public function getIdTeacher()
    {
        return $this->id_teacher;
    }

    /**
     * @param mixed $id_teacher
     */
    public function setIdTeacher($id_teacher): void
    {
        $this->id_teacher = $id_teacher;
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
    public function getIdSchedule()
    {
        return $this->id_schedule;
    }

    /**
     * @param mixed $id_schedule
     */
    public function setIdSchedule($id_schedule): void
    {
        $this->id_schedule = $id_schedule;
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
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }


}