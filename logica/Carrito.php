<?php
require_once 'persistencia/Conexion.php'; // importar conexion
require_once 'persistencia/CarritoDAO.php';

// importar AdmistradorDao
class Carrito
{

    private $id;

    private $id_prod;

    private $cantidad;
    private  $nombre;
    private $monto;

    private $conexion;

    private $carritoDAO;

    public function getId()
    {
        return $this->id;
    }
    public function getId_prod()
    {
        return $this->id_prod;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
  
    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getMonto()
    {
        return $this->monto;
    }
    public function setId_prod($id_prod)
    {
        $this->id_prod= $id_prod;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad= $cantidad;
    }
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }
   
    
    public function __construct($id = "", $id_prod = "",  $nombre="",$cantidad = "", $monto = "")
    {
        $this->id = $id;
        $this->id_prod = $id_prod;
        $this->nombre=$nombre;
        $this->cantidad = $cantidad;
        $this->monto = $monto;
        $this->conexion = new Conexion();
        $this->carritoDAO = new carritoDAO($this->id, $this->id_prod, $this->nombre,$this->cantidad, $this->monto);
    }

    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->carritoDAO->consultar());
        $this->conexion->cerrar();
        $datos = $this->conexion->extraer();
        $id_prod = new Producto($datos[0]);
        $id_prod->consultar();
        $this->id_prod = $id_prod;
        $this->nombre=$registro[1];
        $this->cantidad = $datos[2];
        $this->monto = $datos[3];
    }

    public function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->carritoDAO->consultarTodos());

        $carritos = array();
        while (($registro = $this->conexion->extraer()) != null) {
            $id_prod = new Producto($registro[1]);
            $id_prod->consultar();
            $this->id_prod = $id_prod;
            $carrito = new Carrito($registro[0], $id_prod, $registro[2], $registro[3],$registro[4]);
            array_push($carritos, $carrito);
        }
        $this->conexion->cerrar();
        return $carritos;
    }

    public function crear()
    {
        $this->conexion->abrir();

        $this->conexion->ejecutar($this->carritoDAO->crear()); // crear producto

        $this->conexion->cerrar();
    }
}
?>