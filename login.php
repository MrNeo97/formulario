<?php
spl_autoload_register(function($clase) {
    $archivo =  $clase . '.php';
    include_once $archivo;
});

session_start();

$layout = new Plantillas();
$layout->getHeader($titulo = 'Login');

$errores = [];

if ($_POST) {

    $login = new Formulario();
    $login->login();

    var_dump($errores);
/*if ($login->login()) {
    $layout->cerrarSesion();
}*/

} else {

	include "formulariologin.php";

}

$layout->getFooter();