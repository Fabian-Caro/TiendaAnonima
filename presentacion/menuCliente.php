<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container">
		<a class="navbar-brand" href="#"><img src="img/logo2.png" width="50" /></a>
		<button class="navbar-toggler" type="button"
			data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav me-auto">
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false">Producto</a>
					<ul class="dropdown-menu">
                        <li><a class='dropdown-item' href='#'>Consultar Producto</a></li>
					</ul></li>
			</ul>
			
			<ul class="navbar-nav">
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false"><?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() . " " . $cliente->getEstado() ?></a>
					<ul class="dropdown-menu">
                        <li><a class='dropdown-item' href='?cerrarSesion=true'>Cerrar Sesion</a></li>
					</ul></li>
			</ul>			
		</div>
	</div>
</nav>