<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear Contactos</title>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/js/bootstrap.min.js">
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
	    </ul>
	  </div>
	</nav>

	<?php

	if ($_SESSION['user']) {

		if ($_POST) {
			
			include "/formulario/models/Contacto.php";

			$contacto = new Contacto();

			// $sanar = new Validaciones();

			// $datos = $sanar->sanar();

			try {

				$contacto_id = $contacto->insert($datos);

				echo '<br>El id del nuevo contacto es ' . $contacto_id . '<br>';

				print_r($contacto->all());

				echo "<br>Todo correcto<br>";

			} catch(Exception $e) {

				echo '<h1>Error: ' . $e->getMessage() . '</h1>';

			}

		} else {

			include "registroContactos.php";

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
