<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear Contactos</title>
    <link rel="stylesheet" href="/formulario/css/bootstrap.min.css">
    <link rel="stylesheet" href="/formulario/js/bootstrap.min.js">
    <link rel="stylesheet" href="/formulario/css/font-awesome.min.css">
<style>
	table {
		text-align: center;
	}
</style>
</head>
<body>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="/formulario">Inicio</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="/formulario/admin/crearContactos.php">Crear Contacto</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/formulario/admin/verContactos.php">Ver Contactos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/formulario/admin/buscarContacto.php"><i class="fa fa-search"></i></a>
	      </li>
	    </ul>
	  </div>
	</nav>

<?php 

	include "formBuscar.php";


	if ($_SESSION['user']) {

		if ( $_POST ) {
			
			include "../models/Contacto.php";

			$parametro = strtolower($_POST['parametro']);

			$valor = trim(strtolower($_POST['valor']));

			$contacto = new Contacto();

			$busqueda = $contacto->mostrar($valor, $parametro);

			if ($busqueda) {

?>
<br>
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Teléfono</th>
						<th>Email</th>
						<th>Dirección</th>
						<th>Categoría</th>
						<th>Fecha de alta</th>
						<th>Usuario Propietario</th>
					</tr>
				</thead>
				<tbody>
<?php

				//include "../funciones.php";

				//dimeUsuario();

				$contar = count($busqueda);

				for($i = 0 ; $i < $contar; $i++) {

					echo '<tr>';
					echo '<td>' . $busqueda[$i]['nombre'] . '</td>';
					echo '<td>' . $busqueda[$i]['apellidos'] . '</td>';
					echo '<td>' . $busqueda[$i]['telefono'] . '</td>';
					echo '<td>' . $busqueda[$i]['email'] . '</td>';
					echo '<td>' . $busqueda[$i]['direccion'] . '</td>';
					echo '<td>' . $busqueda[$i]['categoria_id'] . '</td>';
					echo '<td>' . $busqueda[$i]['fecha_alta'] . '</td>';
					echo '<td>' . $_SESSION['user']['nombre'] . '</td>';
					echo '</tr>';
				
				}
?>


	</tbody>
</table>

<?php

			} else {

				if ($_POST['parametro'] == 'nombre') {

					echo "Nombre no encontrado.";

				} else {

					echo "Categoría no encontrada";

				}
			}

		}


	} else {

		header('Location: /formulario/login.php');

	}

?>

<br><br>
<footer>

	<a class="btn btn-danger" href="/formulario/cerrarSesion.php">Cerrar Sesión</a>

</footer>

</body>
</html>