
<?php
include 'presentacion/vistaAdm.php';

if (isset($_POST["crear"])) {
   $tendero = new Tendero($_POST["ID"],$_POST["Nombre"], $_POST["usuario"], $_POST["clave"]);

   $tendero->crear();//
}
?>

<div class="container">
	<div class="row mt-3">
		<div class="col-xs-12 col-lg-4 text-center"></div>
		<div class="col-xs-12 col-lg-4 text-center">
			<div class="card">
				<h5 class="card-header">Registrar Nuevo Tendero</h5>
				<div class="card-body">
          <?php if(isset($_POST["crear"])){?>
    <div class="alert alert-success alert-dismissible fade show"
						role="alert">
						Tendero registrado correctamente
						<button type="button" class="btn-close" data-bs-dismiss="alert"
							aria-label="Close"></button>
					</div>

   			<?php }?>
          <form method="post" enctype="multipart/form-data">
          					<div class="mb-3">
							 <input type="hidden"
								class="form-control" name="ID" required>

						</div>
						<div class="mb-3">
							<label class="form-label">Nombre</label> <input type="text"
								class="form-control" name="Nombre" required>

						</div>
						<div class="mb-3">
							<label class="form-label">Usuario</label> <input type="text"
								class="form-control" name="usuario" required>

						</div>
						<div class="mb-3">
							<label class="form-label">Clave</label> <input type="password"
								class="form-control" name="clave" required>
						</div>

						<button type="submit" class="btn btn-primary text-center" name="crear">Registrar</button>
					</form>
				</div>
			</div>

		</div>

	</div>
</div>
