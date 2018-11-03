<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="container">
	<div class="row">
		<div class="col-6">

			<div class="form-group">

				<h1>Crear nuevo contacto</h1>

				<label for="nombre">Nombre</label>

				<input type="text" class="form-control" name="nombre">

			</div>

			<div class="form-group">

				<label for="apellidos">Apellidos</label>

				<input type="text" class="form-control" name="apellidos">
				
			</div>

			<div class="form-group">

				<label for="telefono">Teléfono</label>

				<input type="text" class="form-control" name="telefono">
				
			</div>

			<div class="form-group">

				<label for="email">Email</label>

				<input type="text" class="form-control" name="email">

			</div>

			<div class="form-group">

				<label for="direccion">Dirección</label>

				<input type="text" class="form-control" name="direccion">
				
			</div>

			<div class="form-group">

				<label for="fecha_alta">Fecha de alta</label>

				<input type="date" class="form-control" name="fecha_alta">
				
			</div>



			<button class="btn btn-primary" type="submit">Enviar</button>


		</div>
	</div>
</div>
</form>