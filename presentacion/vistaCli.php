<?php 
$cliente=new Cliente($_SESSION["id"]);
$cliente->consultar();
?>
<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
  
    <a class="navbar-brand" >ShopInt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?pid=<?php echo base64_encode("presentacion/inicioCliente.php") ?>">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
           
            <li><hr class="dropdown-divider"></li>
            <li><a name="PAN" class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/P_cliente/verPAN.php")  ?>  ">Panaderia Don Enrique</a></li>
            <li><a name="SFE" class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/P_cliente/verSFE.php") ?>  ">Supermercado Felicidad Eterna</a></li>
            <li><a name="REPO" class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/P_cliente/verREPO.php") ?> ">Postres de Juliana</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?pid=<?php echo base64_encode("presentacion/verCarrito.php") ?>">Carrito</a>
        </li>
        
        </ul>
        </div>
        <div class="nav-item dropdown navbar-dark ">
          <a class="nav-link dropdown-toggle text-ligth"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php echo $cliente->getNombre()?>
          </a>
          <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton"">
           <a class="dropdown-item" >
                        <img src="presentacion/img/cli.jpg" alt="user" higth="60" width="60"/>
                    </a>
          
            <li><a class="dropdown-item" ><?php echo $cliente->getUsuario()?></a></li>
            <li><a class="dropdown-item" >Cliente</a></li>
            <li><a class="dropdown-item" href="index.php?sesion=false">Cerrar Sesion</a></li>
          </div>
         
        </div>
      
    
  
</nav>
