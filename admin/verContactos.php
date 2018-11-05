<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Contactos</title>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/js/bootstrap.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
<?php

include "../models/Contacto.php";

$contacto = new Contacto();

$id = $_SESSION['user']['id'];

$valor = $contacto->mostrar($id);

$contar = count($valor);

for($i = 0 ; $i < $contar; $i++) {

	echo '<tr>';
	echo '<td>' . $valor[$i]['nombre'] . '</td>';
	echo '<td>' . $valor[$i]['apellidos'] . '</td>';
	echo '<td>' . $valor[$i]['telefono'] . '</td>';
	echo '<td>' . $valor[$i]['email'] . '</td>';
	echo '<td>' . $valor[$i]['direccion'] . '</td>';
	echo '<td>' . $valor[$i]['categoria_id'] . '</td>';
	echo '<td>' . $valor[$i]['fecha_alta'] . '</td>';
	echo '<td>' . $valor[$i]['usuario_id'] . '</td>';
	echo '<td> <a href="editarContacto.php?id=' . $valor[$i]['id'] . '&nombre=' 
	. $valor[$i]['nombre'] . '&apellidos=' . $valor[$i]['apellidos'] . '&telefono=' 
	. $valor[$i]['telefono'] . '&email=' . $valor[$i]['email'] . '&direccion=' 
	. $valor[$i]['direccion'] . '&fecha_alta=' . $valor[$i]['fecha_alta'] . '">
	<i class="fa fa-pencil-square" style="font-size:36px"></i></a>
				<a href="borrarContacto.php?id=' . $valor[$i]['id'] . '"><i class="fa fa-remove" style="font-size:36px;color:red"></i></a></td>';
	echo '</tr>';

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
