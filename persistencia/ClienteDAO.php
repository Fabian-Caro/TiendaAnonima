<?php

class ClienteDAO{
    private $idPersona;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $estado;

    public function __construct($idPersona=0, $nombre=null, $apellido=null, $correo=null, $clave=null, $estado=null){
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
                where correo = '" . $this -> correo . "' and clave = '" . $this -> clave . "'" ;
    }
    
    public function consultar(){
        return "select idCliente, nombre, apellido, correo, clave, estado
                from Cliente
                where idCliente = '" . $this -> idPersona . "'";
    }

    public function registrar(){
        echo "ID: " . $this->nombre;
        echo " Nombre: " . $this->nombre;
        echo " Apellido: " . $this->apellido;
        echo " correo: " . $this->correo;
        echo " clave: " . $this->clave;
        echo " Estado: " . $this->estado;
        return "INSERT INTO Cliente (nombre, apellido, correo, clave, estado)
                VALUES ('" . $this -> nombre . "', '" .
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