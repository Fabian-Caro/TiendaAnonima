<?php

class Conexion{
    private $mysqlConexion;
    private $resultado;
    
    public function abrirConexion(){
        $this -> mysqlConexion = new mysqli("10.28.0.49:33039", "root", "123456", "tiendaanonima");
    }
    
    public function ejecutarConsulta($sentenciaSQL){
        $this -> resultado = $this -> mysqlConexion -> query($sentenciaSQL);
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