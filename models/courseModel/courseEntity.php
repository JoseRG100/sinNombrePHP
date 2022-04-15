<?php

class courseEntity {
    private $id_course;    
    private $name;
    private $description;
    private $date_start;
    private $date_end;
    private $active;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    
    public function getId_course() {
        return $this->id_course;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate_start() {
        return $this->date_start;
    }

    public function getDate_end() {
        return $this->date_end;
    }

    public function getActive() {
        return $this->active;
    }

    public function setId_course($id_course): void {
        $this->id_course = $id_course;
    }

    public function setName($name): void {
        $this->name = $this->db->real_escape_string($name);
    }

    public function setDescription($description): void {
        $this->description = $this->db->real_escape_string($description);
    }

    public function setDate_start($date_start): void {
        $this->date_start = $date_start;
    }

    public function setDate_end($date_end): void {
        $this->date_end = $date_end;
    }

    public function setActive($active): void {
        $this->active = $this->db->real_escape_string($active);
    }
    
    //TODO: AISLAR AL DAO Y HACER STATIC- SEGUIR EJEMPLO STUDENT MODEL
    public static function getAll(){
        $db = Database::connect();
        $courses = $db->query("SELECT * FROM courses ORDER BY id_course DESC");
        return $courses;
    }

    //TODO: AISLAR AL DAO Y HACER STATIC - SEGUIR EJEMPLO STUDENT MODEL
      public function save(){
        $sql = "INSERT INTO courses VALUES(NULL, '{$this->getName()}', '{$this->getDescription()}', {$this->getDate_start()}, {$this->getDate_end()}, {$this->getActive()})";
        $save = $this->db->query($sql);
        
        
        //echo $sql;
        //echo "<br/>";
        //echo $this->db->error;
        //die();
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;

    }
}  