<?php

class Utils{

    //TODO: DOCUMENTAR TODAS LAS FUNCIONES CON /**
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function isTeacher(){
        if(!isset($_SESSION['teacher'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function isUser(){
        if(!isset($_SESSION['student'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

}

