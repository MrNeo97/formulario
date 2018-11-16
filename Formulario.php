<?php
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 16/11/18
 * Time: 10:35
 */

class Formulario
{


    public function login()
    {

        spl_autoload_register(function($clase) {
            $archivo = './models/' . $clase . '.php';
            include_once $archivo;
        });

        $email = strtolower($_POST['email']);
        $clave = $_POST['clave'];

        $clave = md5($clave);

        $usuario = new Usuario();

        $mostrar = $usuario->consultar($email, $clave);

        if ($mostrar) {

            header('Location: /formulario/admin/administracion.php');

            echo $_SESSION['user']['nombre'];

        } else {
            echo '<br>error Form<br>';
            return false;
        }
    }

    public function register()
    {
        spl_autoload_register(function($clase) {
            $archivo = './models/' . $clase . '.php';
            include_once $archivo;
        });

        $usuario = new Usuario();

        $sanar = new Validaciones();

        $datos = $sanar->sanar();

        try {

            $usuario_id = $usuario->insert($datos);

            echo '<br>El id del nuevo usuario es ' . $usuario_id . '<br>';

            echo "<br>Todo correcto<br>";

            echo '<br><a class="btn btn-primary" href="/formulario/login.php">Login</a>';

        } catch(Exception $e) {

            echo '<h1>Error: ' . $e->getMessage() . '</h1>';

        }
    }

}