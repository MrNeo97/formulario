<?php 

?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="container">
	<div class="row">
		<div class="col-6">
					
			<div class="form-group">

				<h1>Login</h1>
				<label for="email"></label>
				<input type="text" class="form-control" name="email" placeholder="Introduce tu email">

			</div>
			<div class="form-group">

				<label for="clave"></label>

				<input type="password" class="form-control" name="clave" placeholder="Contraseña">
			</div>

			<button class="btn btn-primary" type="submit">Enviar</button>


		</div>
	</div>
</div>
</form>