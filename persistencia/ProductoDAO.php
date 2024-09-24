<?php
require_once 'Conexion.php';

class ProductoDAO{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    
    public function __construct($idProducto=0, $nombre="", $cantidad=0, $precioCompra=0, $precioVenta=0){
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precioCompra = $precioCompra;
        $this->precioVenta = $precioVenta;
    } 

    public function consultarJOIN() {
        $sentencia = "SELECT p.idProducto, p.nombre, p.cantidad, p.precioVenta, p.precioCompra,
                        m.idMarca, m.nombre, c.idCategoria, c.nombre
                        FROM producto p
                        JOIN marca m ON p.Marca_idMarca = m.idMarca
                        JOIN categoria c ON p.Categoria_idCategoria = c.idCategoria";
        return $sentencia;
    }
    
    public function consultarTodos(){
        return "SELECT idProducto, nombre, cantidad, precioVenta, precioCompra FROM producto";
    }   
}

?>