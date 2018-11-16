<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="container">
	<div class="row">
		<div class="col-6">

			<h1>Realiza una búsqueda</h1>

			<div class="form-group">
				
				<label for="busqueda">Realiza una búsqueda de:</label>

			    <select class="form-control" id="seleccion" name="parametro">

			      <option value="nombre">Nombre</option>
			      <option value="categoria_id">Categoría</option>

			    </select>

			</div>

			<div class="form-group">

				<input type="text" class="form-control" name="valor" placeholder="Escribe lo que deseas buscar">

			</div>

			<button class="btn btn-primary" type="submit">Enviar</button>


		</div>
	</div>
</div>
</form>