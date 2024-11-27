<?php
$filtro = $_GET["filtro"];
$cliente = new Cliente();
$clientes = $cliente->buscar($filtro);
?>
<div class="container">
	<div class="row mb-3">
		<div class="col">
			<?php
			if (count($clientes) > 0) {
				echo "<table class='table table-striped table-hover'>";
				echo "<tr>";
				echo "<th>Nombre</th>";
				echo "<th>Apellido</th>";
				echo "<th>Correo</th>";
				echo "<th>Estado</th>";
				echo "</tr>";

				foreach ($clientes as $clienteActual) {
					echo $cliente->getEstado();
					echo "<tr>";
					echo "<td>" . str_ireplace($filtro, "<strong>" . substr($clienteActual->getNombre(), stripos($clienteActual->getNombre(), $filtro), strlen($filtro)) . "</strong>", $clienteActual->getNombre()) . "</td>";
					echo "<td>" . str_ireplace($filtro, "<strong>" . substr($clienteActual->getApellido(), stripos($clienteActual->getApellido(), $filtro), strlen($filtro)) . "</strong>", $clienteActual->getApellido()) . "</td>";
					echo "<td>" . $clienteActual->getCorreo() . "</td>";
					echo "<td>";
					echo "<div id='resultado'>";
					echo "<button class='estado-icon' id='estado_" . $clienteActual->getIdPersona() . "' data-id='" . $clienteActual->getIdPersona() . "' data-estado='" . $clienteActual->getEstado() . "' style='cursor: pointer;'>";
					if ($clienteActual->getEstado() == 1) {
						echo "<img src='img/tic_verde.png' alt='activo' style='width: 20px; height: 20px;'>";
						
					} else {
						echo "<img src='img/tic_prohibido.png' alt='bloqueado' style='width: 20px; height: 20px;'>";
					}
					echo "</button>";
					echo "</div>";
					echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "<div class='alert alert-danger mt-3' role='alert'>No hay resultados</div>";
			}
			?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		console.log('jquery');
		if ($('.estado-icon').length > 0) {
			console.log('Los elementos .estado-icon están presentes en el DOM');
		} else {
			console.log('No se encontraron elementos .estado-icon');
		}

		$(document).off('click', '.estado-icon');
		
		$(document).on('click', '.estado-icon', function() {
			console.log('clic');
			var idCliente = $(this).data('id');
			var estadoActual = $(this).data('estado');
			console.log('ID del cliente:', idCliente);
			console.log('Estado actual:', estadoActual);
			var nuevoEstado = estadoActual == 1 ? 0 : 1;
			console.log('Nuevo estado:', nuevoEstado);

			var url = "indexAjax.php?pid=<?php echo base64_encode('presentacion/administracion/actualizarEstadoClienteAjax.php') . '&idCliente=' ?>" + idCliente + "&estado=" + nuevoEstado;
			console.log('URL de la solicitud:', url);

			$("#resultado").load(url, function(response, status, xhr) {
				console.log('url', url);
				console.log('Respuesta de la carga:', response);
				console.log('Estado de la carga:', status);
				if (status == "success") {
					var nuevaImagen = nuevoEstado == 1 ? 'img/tic_verde.png' : 'img/tic_prohibido.png';
					var nuevoAlt = nuevoEstado == 1 ? 'activo' : 'bloqueado';
					console.log('Actualizando imagen y datos');
					$("#estado_" + idCliente + " img").attr('src', nuevaImagen);
					$("#estado_" + idCliente + " img").attr('alt', nuevoAlt);
					$("#estado_" + idCliente).data('estado', nuevoEstado);
				} else {
					console.error('Error al actualizar el estado');
					alert('Error al actualizar el estado');
				}
			});
		});
	});
</script>