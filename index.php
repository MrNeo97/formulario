<?php
spl_autoload_register(function($clase) {
    $archivo =  $clase . '.php';
    if(file_exists($archivo)) {
        include_once $archivo;
    }
});

$layout = new Plantillas();
$layout->getHeader();
?>
	<div class="container" style="margin-top: 10%">
		<div class="row justify-content-md-center">
			<div class="d-flex justify-content-center">
				<h1>Formulario</h1>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="d-flex justify-content-center">	
				<a class="btn btn-primary" href="login.php" role="button" style="margin-right: 5px; margin-left: -5px;">Login</a>
				<a class="btn btn-primary" href="registro.php" role="button">Registro</a>
			</div>
		</div>	
	</div>

<?php $layout->getFooter(); ?>