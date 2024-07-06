<?php include 'presentacion/vistaAdm.php';
$tienda= new Tienda();
$tiendas= $tienda->consultarTodos();
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";



if(isset($_POST["crear"])){
    $fecha= new DateTime();
    $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
    $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
    if ($tmpImagen!="") {
        move_uploaded_file($tmpImagen,"presentacion/img/".$nombreArchivo);
    }
   $producto= new Producto($_POST["ID_pro"],$_POST["tienda"],$_POST["nom_pro"],$nombreArchivo,$_POST["valor_pro"],$_POST["cant_pro"],$_POST["des_pro"]);
   
   $producto->crear();
}
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-4">
        </div>
        <div class="col-4">
            <div class="card">
                <h3 class="card-header text-center">Crear Producto</h3>
                <div class="card-body">
<?php if(isset($_POST["crear"])){?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    Producto creado correctamente
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

   <?php }?>
                    <form method="post" enctype="multipart/form-data">
                       
                        <div class="mb-3 text-center">
                            
                            <input type="hidden" class="form-control" name="ID_pro" >

                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label ">Nombre</label>
                            <input type="text" class="form-control" name="nom_pro" >

                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Valor</label>
                            <input type="text" class="form-control" name="valor_pro" >
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Cantidad</label>
                            <input type="text" class="form-control" name="cant_pro" >
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Descripcion</label>
                            <input type="text" class="form-control" name="des_pro"  >
                        </div>
                        <div class="mb-4 text-center">
                            <label class="form-label">Tienda</label>
                            <select class="form-select" name="tienda">
                            <?php 
                                foreach ($tiendas as $tiendaActual)
                                echo "<option value='".$tiendaActual->getId()."'>".$tiendaActual->getCod()."(".$tiendaActual->getNombre().")"."</option>";
                            ?>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="txtImagen" id="txtImagen" >
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