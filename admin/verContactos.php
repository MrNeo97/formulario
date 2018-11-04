<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Contactos</title>
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

?>

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

include "../models/Contacto.php";

$contacto = new Contacto();

$contar = count($contacto->all());

for($i = 1 ; $i < $contar; $i++) {

	$valor = $contacto->mostrar($i);

	echo "<br>";
	var_dump($valor);
	echo "<br>";

	// echo '<tr>';
	// echo '<td>' . $valor[0]['nombre'] . '</td>';
	// echo '<td>' . $valor[0]['apellidos'] . '</td>';
	// echo '<td>' . $valor[0]['telefono'] . '</td>';
	// echo '<td>' . $valor[0]['email'] . '</td>';
	// echo '<td>' . $valor[0]['direccion'] . '</td>';
	// echo '<td>' . $valor[0]['categoria_id'] . '</td>';
	// echo '<td>' . $valor[0]['fecha_alta'] . '</td>';
	// echo '<td>' . $valor[0]['usuario_id'] . '</td>';
	// echo '</tr>';

}

?>
	</tbody>
</table>

<?php
		

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
