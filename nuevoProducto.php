<?php
require("logica/Producto.php");
require("logica/Categoria.php");
require("logica/Marca.php");

session_start();
if (isset($_POST['agregarProducto'])) {

    $idProducto = $_POST['idProducto'];
    $nombreProducto = $_POST['nombreProducto'];
    $cantidadProducto = $_POST['cantidadProducto'];
    $precioCompraProducto = $_POST['precioCompraProducto'];
    $precioVentaProducto = $_POST['precioVentaProducto'];
    $marcaProducto = $_POST['marcaProducto'];
    $categoriaProducto = $_POST['categoriaProducto'];
    $idAdministrador = $_SESSION["id"];

    $productoAgregado = array(
        'idProducto' => $idProducto,
        'nombreProducto' => $nombreProducto,
        'cantidadProducto' => $cantidadProducto,
        'precioCompraProducto' => $precioCompraProducto,
        'precioVentaProducto' => $precioVentaProducto,
        'marcaProducto' => $marcaProducto,
        'categoriaProducto' => $categoriaProducto,
        'idAdministrador' => $idAdministrador
    );

    $producto = new Producto();
    $producto->agregarProducto($idProducto, $nombreProducto, $cantidadProducto, $precioCompraProducto, $precioVentaProducto, $marcaProducto, $categoriaProducto, $idAdministrador);

    echo "<div class='alert alert-success'>Producto agregado exitosamente.</div>";
}
if (!isset($_SESSION["id"])) {
    header("Location: iniciarSesion.php");
}
$id = $_SESSION["id"];
require("logica/Persona.php");
require("logica/Administrador.php");
$administrador = new Administrador($id);
$administrador->consultar();
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include("encabezado.php"); ?>
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
                            aria-expanded="false">Opciones</a>
                        <ul class="dropdown-menu">
                            <li><a class='dropdown-item' href='sesionAdministrador.php'>Volver</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                            href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><?php echo $administrador->getNombre() . " " . $administrador->getApellido() ?></a>
                        <ul class="dropdown-menu">
                            <li><a class='dropdown-item' href='index.php?cerrarSesion=true'>Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card border-primary">
                    <div class="card-header text-bg-info">
                        <h4>Nuevo Producto</h4>
                    </div>
                    <div class="card-body">
                        <form action="nuevoProducto.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-3">
                                    <label for="idProducto" class="form-label">Identificador del producto</label>
                                    <input type="text" class="form-control" id="idProducto" name="idProducto" maxlength="3" required>
                                </div>
                                <div class="col">
                                    <label for="nombreProducto" class="form-label">Nombre del producto</label>
                                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3">
                                    <label for="cantidadProducto" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" step="1" required>
                                </div>
                                <div class="col-3">
                                    <label for="precioCompraProducto" class="form-label">Precio de compra</label>
                                    <input type="number" class="form-control" id="precioCompraProducto" name="precioCompraProducto" step="0.01" required>
                                </div>
                                <div class="col-3">
                                    <label for="precioVentaProducto" class="form-label">Precio de venta</label>
                                    <input type="number" class="form-control" id="precioVentaProducto" name="precioVentaProducto" step="0.01" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="marcaProducto" class="form-label">Marca</label>
                                    <select class="form-select" id="marcaProducto" name="marcaProducto" required>
                                        <option value="" selected disabled>Selecciona una marca</option>
                                        <?php
                                        $marca = new Marca();
                                        $marcas = $marca->consultarTodos();
                                        foreach ($marcas as $marcaActual) {
                                            echo "<option value='" . $marcaActual->getIdMarca() . "'>" . $marcaActual->getNombre() . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="categoriaProducto" class="form-label">Categoría</label>
                                    <select class="form-select" id="categoriaProducto" name="categoriaProducto" required>
                                        <option value="" selected disabled>Selecciona una categoría</option>
                                        <?php
                                        $categoria = new Categoria();
                                        $categorias = $categoria->consultarTodos();
                                        foreach ($categorias as $categoriaActual) {
                                            echo "<option value='" . $categoriaActual->getIdCategoria() . "'>" . $categoriaActual->getNombre() . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="agregarProducto">Agregar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>