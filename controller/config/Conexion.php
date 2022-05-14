<?php

class Conexion {

    private $conexion;
    private $configuracion = [
        "driver" => "mysql",
        "host" => "localhost",
        "database" => "sinnombrephp",
        "port" => "3308",
        "username" => "root",
        "password" => "",
        "charset" => "utf8"
    ];

    public function __construct() {

    }

    public function conectar() {
        try {
            $CONTROLADOR = $this->configuracion["driver"];
            $SERVIDOR = $this->configuracion["host"];
            $BASE_DATOS = $this->configuracion["database"];
            $PUERTO = $this->configuracion["port"];
            $USUARIO = $this->configuracion["username"];
            $CLAVE = $this->configuracion["password"];
            $CODIFICACION = $this->configuracion["charset"];

            $url = "{$CONTROLADOR}:host={$SERVIDOR}:{$PUERTO};"
                    . "dbname={$BASE_DATOS};charset={$CODIFICACION}";
            //Se crea la conexión.
            $this->conexion = new PDO($url, $USUARIO, $CLAVE);
            //echo "CONECTADO";
            return $this->conexion;
        } catch (Exception $exc) {
            echo "NO SE HA PODIDO CONECTAR CON LA BASE DE DATOS";
            echo $exc->getTraceAsString();
        }
    }

}
