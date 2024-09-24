<?php

class Conexion{
    private $mysqlConexion;
    private $resultado;

    public function __construct(){
        $this->abrirConexion();
    }
    
    public function abrirConexion(){
        $this -> mysqlConexion = new mysqli("localhost", "root", "1234", "tiendaanonima");
    }
    
    public function ejecutarConsulta($sentenciaSQL){
        $this -> resultado = $this -> mysqlConexion -> query($sentenciaSQL);
        return $this->resultado;
    }
    
    public function siguienteRegistro(){
        return $this -> resultado -> fetch_row();
    }
    
    public function obtenerLlaveAutonumerica(){
        return $this -> mysqlConexion -> insert_id;
    }
    
    public function cerrarConexion(){
        $this -> mysqlConexion -> close();
    }
}

?>