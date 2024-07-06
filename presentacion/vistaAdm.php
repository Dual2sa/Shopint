<?php 
$administrador_ma=new Administrador_ma($_SESSION["id"]);//recibe el id administrador
$administrador_ma->consultar();//consulta los administradores disponibles
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
    <a class="navbar-brand" >ShopInt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/crearProducto.php") ?>">Crear productos</a></li>
            <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/consultarProducto.php") ?>">Consultar productos</a></li>  
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?pid=<?php echo base64_encode("presentacion/producto/verTiendas.php") ?>">Tienda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Informes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?pid=<?php echo base64_encode("presentacion/producto/registrarTend.php") ?>">Registrar Tendero</a>
        </li>
        </ul>
        </div>
        <div class="nav-item dropdown ">
          <<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
           <?php echo $administrador_ma->getNombre()?>
          </button>
          <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton"">
           <a class="dropdown-item" >
                        <img src="presentacion/img/user1.png" alt="user" higth="60" width="60"/>
                    </a>
          
            <li><a class="dropdown-item" ><?php echo $administrador_ma->getUsuario()?></a></li>
            <li><a class="dropdown-item" >Administrador</a></li>
            <li><a class="dropdown-item" href="index.php?sesion=false">Cerrar Sesion</a></li>
          </div>
         
        </div>
      
    
  
</nav>
