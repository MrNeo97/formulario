<?php 

session_start();

include "../models/Contacto.php";

if ($_SESSION['user']) {

	if($_GET['id']) {

		$contacto = new Contacto();

		$params = array("id" => $_GET['id']);

		$contacto->delete($params);

		header('Location: /formulario/admin/verContactos.php');

	} else {

		header('Location: /formulario/admin/verContactos.php');

	}
	
} else {

	header('Location: /formulario/login.php');

}

