<?php
include 'presentacion/vistaTienda.php';

$producto = new Producto();
$productos = $producto->consultarTodos();
$cliente = new Cliente();
$clientes = $cliente->consultarTodos();
$venta = new Venta();
$id_tende=1;
$total=0;
$fechaActual = date('Y-m-d');
if(isset($_POST["crear"])){   
    $proc = new Producto();
    $proc -> setId_tien($_POST["prod"]);
    //$procs= $proc->consultarMonto();
   
   //$procs= $proc->consultarMonto();
    
    //$total=($_POST["cant"])*(100);
    
    //$venta= new Venta('',$_POST["cliente"],$id_tende,$total,$fechaActual,$_POST["prod"]);
    
  //$venta->crear();
    
}
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-4">
        </div>
        <div class="col-4">
            <div class="card">
                <h3 class="card-header text-center">Generar Venta</h3>
                <div class="card-body">
<?php if(isset($_POST["crear"])){?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
    Venta generada exitosamente
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

   <?php }?>
                    <form method="post" enctype="multipart/form-data">
                       
                       
						<div class="mb-4 text-center" >
							<label class="form-label">Cliente</label> <select
								class="form-select" name="cliente">
                            <?php
                            foreach ($clientes as $cliActual)
                                echo "<option value='" . $cliActual->getId() . "'>" . $cliActual->getNombre() . "</option>";
                            ?>
                            </select>
						</div>
                        
                        <div class="mb-4 text-center">
							<label class="form-label">Producto</label> <select
								class="form-select " name="prod">
                            <?php
                            foreach ($productos as $proActual)
                                echo "<option value='" . $proActual->getId() . "'>" . $proActual->getNombre() ." = $". $proActual->getValor(). "</option>";


                            ?>
                            </select>
				
                        <div class="mb-3 text-center">
                            <label class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="cant" min="1" >
                        </div>
      
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary text-center" name="crear" >Crear</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>