<?php

class Errores
{

    public function mostrarCampo($campo)
    {
        if( isset($_POST[$campo])) {
            echo ' value="' . $_POST[$campo] . '"';
        }

        if( isset($_GET[$campo])) {
            echo ' value="' . $_GET[$campo] . '"';
        }
    }

    public function mostrarErrorCampo($campo, $errores)
    {
        if (isset($errores[$campo])) {
            echo '<div class="text-danger">' . $errores[$campo] . '</div>';
        }
    }

}