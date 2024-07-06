<?php include 'presentacion/vistaTienda.php'; ?>

<div class="jumbotron">
  <h1 class="display-3">Bienvenido</h1>
  <p class="lead"><?php echo $tendero->getNombre()?></p>
  <hr class="my-2">
  <p>Tendero</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="index.php?pid=<?php echo base64_encode("presentacion/producto/verTienda.php") ?>" role="button">Ver Todos Los Productos</a>
  </p>
</div>