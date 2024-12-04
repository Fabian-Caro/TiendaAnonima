<?php

class Cliente extends Persona{

    private $estado;
    
    public function __construct($idPersona=0, $nombre="", $apellido="", $correo="", $clave="", $estado=1){
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave);
        $this -> estado = $estado;
    }

    public function getEstado() {
        return $this -> estado;
    }

    public function setEstado($estado) {
        $this -> estado = $estado;
    }
    
    public function registrar(){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $clienteDAO = new ClienteDAO($this -> idPersona, $this -> nombre, $this -> apellido, $this -> correo, $this -> clave, $this -> estado);
        $conexion -> ejecutarConsulta($clienteDAO -> registrar());
        $this -> idPersona = $conexion -> obtenerLlaveAutonumerica();
        $conexion -> cerrarConexion();
        echo $this -> idPersona;
    }
 
    public function autenticar(){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $clienteDAO = new ClienteDAO(null, null, null, $this -> correo, $this -> clave, null);
        $conexion -> ejecutarConsulta($clienteDAO -> autenticar());
        if($conexion -> numeroFilas() == 0){
            $conexion -> cerrarConexion();
            return false;
        }else{
            $registro = $conexion -> siguienteRegistro();
            $this -> idPersona = $registro[0];
            $conexion -> cerrarConexion();
            return true;
        }
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $clienteDAO = new ClienteDAO($this -> idPersona);
        $conexion -> ejecutarConsulta($clienteDAO -> consultar());
        $registro = $conexion -> siguienteRegistro();
        $this -> nombre = $registro[0];
        $this -> apellido = $registro[1];
        $this -> correo = $registro[2];
        $this -> estado = $registro[3];
        $conexion -> cerrarConexion();
    }

    public function buscar($filtro){
        $clientes = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $clienteDAO = new ClienteDAO();
        $conexion -> ejecutarConsulta($clienteDAO -> buscar($filtro));
        while ($registro = $conexion -> siguienteRegistro()) {
            $cliente = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5]);
            array_push($clientes, $cliente);
        }
        
        $conexion -> cerrarConexion();
        return $clientes;
    }

    public function actualizarEstado($idCliente, $estado) {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $clienteDAO = new ClienteDAO($idCliente, null, null, null, null, $estado);
        $conexion->ejecutarConsulta($clienteDAO->actualizar($idCliente, $estado));
        return true;
    }
    
}

?>




