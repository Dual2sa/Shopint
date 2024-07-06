<?php include 'presentacion/Cabecera.php';

$error =0;
if (isset($_GET["error"])){//Error en el sistema de logeo clave o usuario incorrectos
    $error=$_GET["error"];
}

?>
<div class="container">
    <div class="row mt-3">
        <div class="col-xs-12 col-lg-4 text-center">
        </div>
        <div class="col-xs-12 col-lg-4 text-center">
            <div class="card">
                <h5 class="card-header">Iniciar Sesion</h5>
                <div class="card-body">
                    <form method="post"
                        action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php")?>">
                        <!-- Accion para autenticar los usuarios -->
                        <div class="mb-3">
                            <label class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" required>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Clave</label>
                            <input type="password" class="form-control" name="clave" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Ingresar</button>

                        <?php if ($error==1){?>
                        <!-- Alerta datos erroneos-->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Usuario o Clave incorrectos
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php }?>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>