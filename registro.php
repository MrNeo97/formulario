 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Registro</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/js/bootstrap.min.js">
 </head>
 <body>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="./">Inicio</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="login.php">Login</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="registro.php">Registro</a>
	      </li>
	    </ul>
	  </div>
	</nav>

 	<?php 

	$errores = [];

	if (! $_POST) {

		include "formularioregistro.php";

	} else {

		include 'models/Usuario.php';

		$usuario = new Usuario();

		$sanar = new Validaciones();

		$datos = $sanar->sanar();

		try {

			$usuario_id = $usuario->insert($datos);

			echo '<br>El id del nuevo usuario es ' . $usuario_id . '<br>';

			print_r($usuario->all());

			echo "<br>Todo correcto<br>";

		} catch(Exception $e) {

			echo '<h1>Error: ' . $e->getMessage() . '</h1>';

		}

	}

 	?>
 </body>
 </html>