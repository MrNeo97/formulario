<?php 

class Validaciones
{

	public function sanar()
	{
		$datos = [];

		$datos = array ("nombre" => filter_var(trim(strtolower($_POST['nombre'])), FILTER_SANITIZE_STRING),
						"email" => filter_var(trim(strtolower($_POST['email'])), FILTER_SANITIZE_STRING),
						"clave" => $_POST['clave1']);

		return $datos;
	}

	private function validaNombre($nombre)
	{
		// NOMBRE
			if ( ! isset($nombre)) {
				$errores['nombre'] = "No he recibido el nombre<br>";
				return $errores;

			} elseif (strlen($nombre) < 3 ) {
			 	$errores['nombre'] = "Campo nombre demasiado corto<br>";
			 	return $errores;
			}
	}

	// APELLIDOS
			// if ( ! isset($_POST['apellidos'])) {
			// $errores['apellidos'] = "No he recibido los apellidos<br>";
			// return $errores;

			// } elseif (strlen($_POST['apellidos']) < 3) {
			//  	$errores['apellidos'] = "Campo apellidos demasiado corto<br>";
			// return $errores;

			// }

	private function validaEmail($email)
	{
		// EMAIL
				if ( ! isset($email)) {
				 	$errores['email'] = "No he recibido el email<br>";
				 	return $errores;

				} elseif (strlen($email) < 6 ) {
				 	$errores['email'] = "El email no es válido<br>";
				 	return $errores;

				}
	}

	// NICKNAME
			// if ( ! isset($_POST['nickname'])) {
			//  	$errores['nickname'] = "No he recibido el Nickname<br>";
					//return $errores;

			// } elseif (strlen($_POST['nickname']) < 3 ) {
			//  	$errores['nickname'] = "El Nickname debe tener al menos 3 caracteres<br>";
					//return $errores;

			// }

	private function validaClave($clave)
	{
		// CLAVE
			if ( ! isset($clave) || ! isset($_POST['clave2'])) {
			 	$errores['clave'] = "No he recibido ambas claves<br>";
			 	return $errores;

			} elseif (strlen($clave) < 6) {
			 	$errores['clave'] = "La clave ha de tener al menos 6 caracteres<br>";
			 	return $errores;

			} /*elseif (!preg_match('`[a-z]`', $clave)){
			    $errores['clave'] = "La clave debe tener al menos una letra minúscula";
			    return $errores;
			
			} elseif (!preg_match('`[A-Z]`', $clave)){
			    $errores['clave'] = "La clave debe tener al menos una letra mayúscula";
			    return $errores;
			
			} elseif (!preg_match('`[0-9]`', $clave)){
		      	$errores['clave'] = "La clave debe tener al menos un caracter numérico";
		      	return $errores;

	   		}*/ elseif ($clave != $_POST['clave2']) {
			 	$errores['clave'] = "Las claves tienen que ser iguales<br>";
			 	return $errores;
			}

	}

	private function claveEncrypt($params)
	{
		$params['clave'] = md5($params['clave']);
		return $params;
	}

	public function Validar($params)
	{
		$errores = [];
		$errorNombre = $this->validaNombre($params['nombre']);
		$errorEmail = $this->validaEmail($params['email']);
		$errorClave = $this->validaClave($params['clave']);

		if ($errorNombre) {
			$errores += $errorNombre;
		}
		if ($errorEmail) {
			$errores += $errorEmail;
		}
		if ($errorClave) {
			$errores += $errorClave;
		} 
		if (!$errorNombre && !$errorEmail && !$errorClave) {
			$params = $this->claveEncrypt($params);
			echo "<br><br>";
			//var_dump($params);
			return $params;
		}

		//$this->validaClave($params['clave'])= $this->validaClave($params['clave']);

		if ($errores) {
			include "formularioregistro.php";
		}
	}
}



