<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
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

if ($_POST) {


	$email = strtolower($_POST['email']);
	$clave = $_POST['clave'];

	$clave = md5($clave);

	include "models/Usuario.php";

	$usuario = new Usuario();

	$mostrar = $usuario->consultar($email, $clave);

	if ($mostrar) {

		// echo "<br>Hola ";
		// echo $_SESSION['user']['nombre'];
		// echo "<br>";

		header('Location: /formulario/admin/administracion.php');

		echo $_SESSION['user']['nombre'];

	}
	?>
<br><br>
<footer>
	
	<a class="btn btn-danger" href="/formulario/cerrarSesion.php">Cerrar Sesión</a>

</footer> 

<?php 

} else {

	include "formulariologin.php";

}

?>

</body>
</html>