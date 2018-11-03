<?php

function mostrar_campo($campo) {
	if( isset($_POST[$campo])) {
	echo ' value="' . $_POST[$campo] . '"';
	}
}

function mostrar_error_campo($campo, $errores) {

	if (isset($errores[$campo])) {
		echo '<div class="errorf">' . $errores[$campo] . '</div>';
	}
}

?>