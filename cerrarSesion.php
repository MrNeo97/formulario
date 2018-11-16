<?php

spl_autoload_register(function($clase) {
    $archivo = $clase . '.php';
    include $archivo;
});

session_start();
session_destroy();

$layout = new Plantillas();
$layout->getHeader($titulo = 'Cerrar Sesión');
?>
	
	<h1>Acabas de salir de la sesión</h1>
	<br>
	<a class="btn btn-primary" href="index.php">Regresar a la página principal</a>


<?php $layout->getFooter(); ?>
