<?php
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 15/11/18
 * Time: 18:45
 */

class Plantillas
{

    public function getHeader($titulo = 'Formulario')
    {
        require "./layout/header.php";
    }

    public function getFooter()
    {
        require "./layout/footer.php";
    }

    public function cerrarSesion()
    {
        require "./layout/cerrar.php";
    }
}