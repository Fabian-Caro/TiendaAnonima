<?php
if (isset($_GET['idCliente']) && isset($_GET['estado'])) {
    $idCliente = $_GET['idCliente'];
    $estado = $_GET['estado'];
    $cliente = new Cliente();
    $resultado = $cliente->actualizarEstado($idCliente, $estado);

    if ($resultado) {
        echo "<button class='estado-icon' id='estado_" . $idCliente . "' data-id='" . $idCliente . "' data-estado='" . $estado . "' style='cursor: pointer;'>";
        if ($estado == 1) {
            echo "<img src='img/tic_verde.png' alt='activo' style='width: 20px; height: 20px;'>";
        } else {
            echo "<img src='img/tic_prohibido.png' alt='bloqueado' style='width: 20px; height: 20px;'>";
        }
        echo "</button>";
    } else {
        echo 'error';
    }
} else {
    echo 'error de parametros';
}
