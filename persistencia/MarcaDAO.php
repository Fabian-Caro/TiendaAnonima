<?php
    class MarcaDAO {
        private $idMarca;
        private $nombre;

        public function __constuct($idMarca = 0, $nobmre="") {
            $this->$idMarca = $idMarca;
            $this->$nombre = $nombre;
        }

        public function consultarTodos() {
            return "SELECT idMarca, nombre FROM Marca";
        }
    }
?>