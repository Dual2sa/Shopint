<?php 
session_start();
require_once 'logica/Administrador_ma.php';//Importar Administrador y sus funciones
require_once 'logica/Cliente.php';//Importar Cliente y sus funciones
require_once 'logica/Tendero.php';
require_once 'logica/Tienda.php';
require_once 'logica/Producto.php';//Importar Tienda y sus funciones
require_once 'logica/Carrito.php';
require_once 'logica/Venta.php';


if(isset($_GET["sesion"]) && $_GET["sesion"] == "false"){
    $_SESSION["id"] = "";
    $_SESSION["rol"] = "";
}

$pid = "";
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
}
$paginasSin= array(
    "presentacion/proyecto.php",
    "presentacion/inicio.php",
    "presentacion/autenticar.php",
    "presentacion/registrar.php",
)
 
?>
<html>
<head>
  <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  <link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" ></script>
</head>


<?php
if ($pid != "") {
    if(in_array($pid, $paginasSin)){
        include $pid;
    }else{
        if(isset($_SESSION["id"]) && $_SESSION["id"] != ""){
            include $pid;
        }else{
            include 'presentacion/inicio.php';
        }
    }
} else {
    include 'presentacion/proyecto.php';
}
?>
 
</html>
