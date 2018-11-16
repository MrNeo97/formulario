<?php
spl_autoload_register(function($clase) {
    $archivo =  $clase . '.php';
    include_once $archivo;
});

$layout = new Plantillas();
$layout->getHeader($titulo = 'Registro');

$errores = [];

if (! $_POST) {

    include "formularioregistro.php";

} else {

$registro = new Formulario();
$registro->register();

}

$layout->getFooter();