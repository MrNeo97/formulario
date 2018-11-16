<?php
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 16/11/18
 * Time: 10:35
 */

include "./models/Usuario.php";

class Formulario
{


    public function login()
    {

        $email = strtolower($_POST['email']);
        $clave = $_POST['clave'];

        $clave = md5($clave);

        $usuario = new Usuario();

        $mostrar = $usuario->consultar($email, $clave);

        if ($mostrar) {

            header('Location: /formulario/admin/administracion.php');

            echo $_SESSION['user']['nombre'];

        }
    }

    public function register()
    {

        $usuario = new Usuario();

        $sanar = new Validaciones();

        $datos = $sanar->sanar();

        try {

            $usuario_id = $usuario->insert($datos);

            echo 'El id del nuevo usuario es ' . $usuario_id . '<br>';

            echo "<br>Todo correcto<br>";

            echo '<br><a class="btn btn-primary" href="/formulario/login.php">Login</a>';

        } catch(Exception $e) {

            $errores['email'] = $e->getMessage();

            include "formulariologin.php";
            //echo '<h1>Error: ' . $e->getMessage() . '</h1>';

        }
    }

}