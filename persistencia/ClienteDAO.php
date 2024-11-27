<?php

class ClienteDAO{
    private $idPersona;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $estado;

    public function __construct($idPersona=null, $nombre=null, $apellido=null, $correo=null, $clave=null, $estado=null){
        $this -> idPersona = $idPersona;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> estado = $estado;
    }
    
    public function autenticar(){
        return "select idCliente
                from Cliente 
                where correo = '" . $this -> correo . "' and clave = '" . $this -> clave . "'";
    }
    
    public function consultar(){
        return "select nombre, apellido, correo, estado
                from Cliente
                where idCliente = '" . $this -> idPersona . "'";
    }

    public function registrar(){
        return "insert into Cliente (nombre, apellido, correo, clave, estado)
                values ('" . $this -> nombre . "', '" .
                             $this -> apellido . "', '" .
                             $this -> correo . "', '" .
                             $this -> clave . "', '" . 
                             $this -> estado . "')";
    }

    public function buscar($filtro){
        return "SELECT idCliente, nombre, apellido, correo, clave, estado
                FROM Cliente
                WHERE nombre LIKE '%" . $filtro . "%' OR apellido LIKE '%" . $filtro . "%'";
    }

    public function actualizar($idCliente, $estado) {
        return "UPDATE Cliente SET estado = " . $estado . " WHERE idCliente = " . $idCliente;
    }
}

?>