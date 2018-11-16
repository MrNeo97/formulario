<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Contactos</title>
    <link rel="stylesheet" href="/formulario/css/bootstrap.min.css">
    <link rel="stylesheet" href="/formulario/js/bootstrap.min.js">
    <link rel="stylesheet" href="/formulario/css/font-awesome.min.css">
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

if ($_SESSION['user']) {

	include "../funciones.php";

	include "registroContactos.php";

	if ($_POST) {

		$fecha = date('Y-m-d');

		$datos = array ("nombre" => filter_var(trim(strtolower($_POST['nombre'])), FILTER_SANITIZE_STRING),
						"apellidos" => filter_var(trim(strtolower($_POST['apellidos'])), FILTER_SANITIZE_STRING),
						"telefono" => filter_var(trim(strtolower($_POST['telefono'])), FILTER_SANITIZE_STRING),
						"email" => filter_var(trim(strtolower($_POST['email'])), FILTER_SANITIZE_STRING),
						"direccion" => filter_var(trim(strtolower($_POST['direccion'])), FILTER_SANITIZE_STRING),
						"fecha_alta" => $fecha
					);

		if( $_POST['fecha_alta'] ) {

				$datos['fecha_alta'] = trim($_POST['fecha_alta']);

			}

		include "../models/Contacto.php";

		$id = array ('id' => $_GET['id']);

		$contacto = new contacto();

		$contacto->update($datos, $id);

		header('Location: /formulario/admin/verContactos.php');

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