<?php

class scheduleEntity {
    // ------------------------------------- ATRIBUTES ------------------------------------- //
    private $id_schedule;
    private $id_class;
    private $time_start;
    private $time_end;
    private $day;

    // ----------------------------------- CONSTRUCTOR ----------------------------------- //
    public function __construct() {
    }

    // ------------------------------- GETTERS & SETTERS -------------------------------- //
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
    public function getTimeStart()
    {
        return $this->time_start;
    }

    /**
     * @param mixed $time_start
     */
    public function setTimeStart($time_start): void
    {
        $this->time_start = $time_start;
    }

    /**
     * @return mixed
     */
    public function getTimeEnd()
    {
        return $this->time_end;
    }

    /**
     * @param mixed $time_end
     */
    public function setTimeEnd($time_end): void
    {
        $this->time_end = $time_end;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day): void
    {
        $this->day = $day;
    }

    // ------------------------------ MODEL METHODES ------------------------------ //

} //end scheduleEntity