<?php 
//include ('../logica/Venta.php');
$tendero=new Tendero($_SESSION["id"]);//vista de la tienda
$tendero->consultar();
?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  
    <a class="navbar-brand" >ShopInt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?pid=<?php echo base64_encode("presentacion/inicioTienda.php") ?>">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Ventas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/Genventa.php") ?>">Generar Venta</a></li>
            <!-- <li><a class="dropdown-item" href="#">ola</a></li> -->
            <li><hr class="dropdown-divider"></li>
            
            <li><a name="PAN" class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/P_tienda/verPAN.php")  ?>  ">Panaderia Don Enrique</a></li>
            <li><a name="SFE" class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/P_tienda/verSFE.php") ?>  ">Supermercado Felicidad Eterna</a></li>
            <li><a name="REPO" class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/P_tienda/verREPO.php") ?> ">Postres de Juliana</a></li>
           

          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page"href="index.php?pid=<?php echo base64_encode("presentacion/producto/verTienda.php") ?>">Tienda</a>
        </li>
        
        
        </ul>
        </div>
        <div class="md-ld-4">
         <div class="nav-item dropdown ">
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
           <?php echo $tendero->getNombre()?>
          </button>
          <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton"">
           <a class="dropdown-item" >
                        <img src="presentacion/img/user1.png" alt="user" higth="60" width="60"/>
                    </a>
          
            <li><a class="dropdown-item" ><?php echo $tendero->getUsuario()?></a></li>
            <li><a class="dropdown-item" >Tendero</a></li>
            <li><a class="dropdown-item" href="index.php?sesion=false">Cerrar Sesion</a></li>
          </div>
         
        </div>
        </div>
       
      
    
  
</nav>


