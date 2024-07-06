<?php

$usuario=$_POST["usuario"];
$clave=$_POST["clave"];

$administrador_ma= new Administrador_ma("","",$usuario,$clave);
$cliente= new Cliente("","",$usuario,$clave);
$tendero= new Tendero("","",$usuario,$clave);

if($administrador_ma->autenticar()){//validar datos con respecto a la tabla adminsitrador
    $_SESSION["id"]=$administrador_ma->getId();
    $_SESSION["rol"]="administrador";
    header("Location:index.php?pid=".base64_encode("presentacion/vistaAdm.php"));
}
 else if($cliente->autenticar()){//validar datos con respecto a la tabla cliente
    $_SESSION["id"]=$cliente->getId();
    $_SESSION["rol"]="cliente";
    header("Location:index.php?pid=".base64_encode("presentacion/inicioCliente.php"));
}
 else if($tendero->autenticar()){//validar datos con respecto a la tabla tienda
    $_SESSION["id"]=$tendero->getId();
    $_SESSION["rol"]="tendero";
    header("Location:index.php?pid=".base64_encode("presentacion/inicioTienda.php"));
}
 else {
    header("Location:index.php?pid=".base64_encode("presentacion/inicio.php")."&error=1");
}

?>