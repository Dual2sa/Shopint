<?php
require_once 'persistencia/Conexion.php';//importar conexion
require_once 'persistencia/ProductoDAO.php';//importar productoDao

class Producto{//datos del producto
    private $id;
    private  $id_tien;
    private  $nombre;
    private  $imagen;
    private  $valor;
    private  $cantidad;
    private  $descripcion;
    private  $productoDAO;
    
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getId_tien()
    {
        return $this->id_tien;
    }

    public function setId_tien($id_tien)
    {
        $this->id_tien = $id_tien;
    }
    
    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }
    
    /**
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }
    
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
   

    public function __construct($id="", $id_tien="", $nombre="", $imagen="", $valor="", $cantidad="", $descripcion=""){
        $this->id=$id;
        $this->id_tien=$id_tien;
        $this->nombre=$nombre;
        $this->imagen=$imagen;
        $this->valor=$valor;
        $this->cantidad=$cantidad;
        $this->descripcion=$descripcion;
        $this->conexion= new Conexion();
        $this->productoDAO=new ProductoDAO($this->id, $this->id_tien, $this->nombre, $this->imagen,$this->valor, $this->cantidad,$this->descripcion);
        
    }
    public function crear(){
        $this->conexion->abrir();
        
        $this->conexion->ejecutar($this->productoDAO->crear());//crear producto
       
        $this->conexion->cerrar();
    }
    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->productoDAO->consultar());
        $registro= $this->conexion->extraer();
        $id_tien = new Tienda($registro[0]);
        $id_tien -> consultar();
        $this -> id_tien = $id_tien;
        $this->nombre=$registro[1];
        $this->imagen=$registro[2];
        $this->valor=$registro[3];
        $this->cantidad=$registro[4];
        $this->descripcion=$registro[5];
        $this->conexion->cerrar();
        
    }
    
    
    public function consultarTodos(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->productoDAO->consultarTodos());
        
        $productos = array();
        while(($registro = $this -> conexion -> extraer()) != null){
            $id_tien = new Tienda($registro[1]);
            $id_tien -> consultar();
            $this -> id_tien = $id_tien;
            $producto = new Producto($registro[0], $id_tien, $registro[2], $registro[3], $registro[4], $registro[5],$registro[6]);
            array_push($productos, $producto);
        }
        $this -> conexion -> cerrar();
        return  $productos;
        
        
    }
    
    public function consultarProTienda(){
        $this->conexion->abrir();
        $this->productoDAO -> setId_tien($this->id_tien);
        $this->conexion->ejecutar($this->productoDAO->consultarProTienda());
        
        $productos = array();
        while(($registro = $this -> conexion -> extraer()) != null){
            $id_tien = new Tienda($registro[1]);
            $id_tien -> consultar();
            $this -> id_tien = $id_tien;
            $producto = new Producto($registro[0], $id_tien, $registro[2], $registro[3], $registro[4], $registro[5],$registro[6]);
            array_push($productos, $producto);
        }
        $this -> conexion -> cerrar();
        return  $productos;
        
        
    }
    public function consultarMonto(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->productoDAO->consultarMonto());
        $datos= $this->conexion->extraer();
        $this->valor=$datos[0];
        $this->conexion->cerrar();
    }

        
    
    
   
}
?>