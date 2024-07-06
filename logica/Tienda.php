<?php
require_once 'persistencia/Conexion.php';
require_once 'persistencia/TiendaDAO.php';
/**
 * @author david
 *
 */
class Tienda{
    private $id;
    
    private $cod;
    private $nombre;
    private  $conexion;
    private  $tiendaDAO;
    

    public function getId_tend()
    {
        return $this->id_tend;
    }

    public function getCod()
    {
        return $this->cod;
    }


    public function getId()
    {
        return $this->id;
    }
   
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function __construct($id="", $cod="",$nombre=""){
        $this->id=$id;
        $this->cod=$cod;
        $this->nombre=$nombre;
        $this->conexion= new Conexion();
        $this->tiendaDAO=new TiendaDAO($this->id, $this->cod, $this->nombre);
        
    }

    
    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tiendaDAO->consultar());
        $registro= $this->conexion->extraer();
        $this->cod=$registro[0];
        $this->nombre=$registro[1];
        $this->conexion->cerrar();
       
    }
    
    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tiendaDAO -> consultarTodos()); 
        $tiendas = array();
        while(($registro = $this -> conexion -> extraer()) != null){
            $this->id=$registro[0];
            $this->cod=$registro[1];
            $this->nombre=$registro[2];
            $tienda = new Tienda($registro[0], $registro[1], $registro[2]); 
            array_push($tiendas, $tienda);
        }
        $this -> conexion -> cerrar();
        return  $tiendas;
    }
   
}
?>
