<?php include 'presentacion/vistaTienda.php';

$producto = new Producto();
$id_tien = '1';
$producto -> setId_tien($id_tien);
$productos= $producto->consultarProTienda();
?>
<div class="container">
<br>
         <div class="row">
<?php 

foreach ($productos as $productoActu) { ?>

	<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="presentacion/img/<?php echo $productoActu->getImagen();?>" width="300" height="300"">
        <div class="card-body" name="pro" value=<?php echo $productoActu->getId();?>>
            <h3 class="card-title"><?php echo $productoActu->getNombre();?></h3>
			<h6 class="card-title">Valor: $<?php echo $productoActu->getValor();?></h6>
			<h6 class="card-title">Descripcion: <?php echo $productoActu->getDescripcion();?></h6>
			<div class="text-center">
			
			<button    class="btn btn-primary text-center"  disabled>Agregar al carrito </button>
			</div>
            
        </div>
    </div>
</div>

<?php } ?>
</div>
</div>