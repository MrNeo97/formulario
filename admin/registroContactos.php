<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="container">
	<div class="row">
		<div class="col-6">

			<div class="form-group">

				<h1>Crear nuevo contacto</h1>

				<label for="nombre">Nombre</label>

				<input type="text" class="form-control" name="nombre"
				<?php mostrar_campo('nombre'); ?>>

			</div>

			<div class="form-group">

				<label for="apellidos">Apellidos</label>

				<input type="text" class="form-control" name="apellidos"
				<?php mostrar_campo('apellidos'); ?>>
				
			</div>

			<div class="form-group">

				<label for="telefono">Teléfono</label>

				<input type="text" class="form-control" name="telefono"
				<?php mostrar_campo('telefono'); ?>>
				
			</div>

			<div class="form-group">

				<label for="email">Email</label>

				<input type="text" class="form-control" name="email"
				<?php mostrar_campo('email'); ?>>

			</div>

			<div class="form-group">

				<label for="direccion">Dirección</label>

				<input type="text" class="form-control" name="direccion"
				<?php mostrar_campo('direccion'); ?>>

			</div>

			<div class="form-group">

				<label for="fecha_alta">Fecha de alta (opcional)</label>

				<input type="date" class="form-control" name="fecha_alta"
				<?php mostrar_campo('fecha_alta'); ?>>
				
			</div>



			<button class="btn btn-primary" type="submit">Enviar</button>


		</div>
	</div>
</div>
</form>