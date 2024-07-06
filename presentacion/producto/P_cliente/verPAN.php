<?php include 'presentacion/vistaCli.php';
$carrito= new Carrito();
$carritos= $carrito->consultarTodos();
$producto = new Producto();
$id_tien = '1';
$producto -> setId_tien($id_tien);
$productos= $producto->consultarProTienda();

if(isset($_POST["crear"])){
  
    $carrito= new Carrito('','','','','');
   
    $carrito->crear();
}
?>
<div class="container">
    <br>
    <div class="row">

        <?php 

            foreach ($productos as $productoActu) { ?>

        <div class="col-md-3" value=<?php echo $productoActu->getId();?>>
            <form method="post">
                <div class="card" name="prod">

                    <img class="card-img-top" src="presentacion/img/<?php echo $productoActu->getImagen();?>"
                        width="300" height="300">
                    <div class=" card-body">
                    <h3 class="card-title"><?php echo $productoActu->getNombre();?></h3>
                    <h6 class="card-title">Valor: $<?php echo $productoActu->getValor();?></h6>
                    <h6 class="card-title">Descripcion: <?php echo $productoActu->getDescripcion();?></h6>
                    <div class="mb-3 text-center" name="cant">
                        <label class="form-label">Cantidad</label>
                        <input type="number" class="form-control" value='1' min='1'>
                    </div>
                    <div class="text-center">

                        <button name="crear" class="btn btn-primary text-center">Agregar al carrito </button>
                    </div>

                </div>
        </div>
        </form>
    </div>

    <?php } ?>

</div>
</div>