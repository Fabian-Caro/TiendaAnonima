<?php
if (isset($_GET['idCliente']) && isset($_GET['estado'])) {
    $idCliente = $_GET['idCliente'];
    $estado = $_GET['estado'];
    $cliente = new Cliente();
    $resultado = $cliente->actualizarEstado($idCliente, $estado);

    if ($resultado) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error de parametros';
}
?>
