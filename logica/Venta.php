<?php
require_once 'persistencia/Conexion.php';//importar conexion
require_once 'persistencia/VentaDAO.php';//importar productoDao

class Venta  {//datos de venta
    private  $id;
    private  $id_cli;
    private  $id_tien;
    private  $id_pro;
    private  $total;
    private  $fecha;
    private  $conexion;
    private  $ventaDAO;
    
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    public function getId_cli()
    {
        return $this->id_cli;
    }
    /**
     * @return string
     */
    public function getId_tien()
    {
        return $this->id_tien;
    }
    
    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    public function getId_pro()
    {
        return $this->id_pro;
    }
    
    /**
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }
    
    
    
    
    
    public function __construct($id="",  $id_cli="", $id_tien="",  $total="", $fecha="",$id_pro=""){
        $this->id=$id;
        $this->id_cli=$id_cli;
        $this->id_tien=$id_tien;
        $this->total=$total;
        $this->fecha=$fecha;
        $this->id_pro=$id_pro;
        $this->conexion= new Conexion();
        $this->ventaDAO=new VentaDAO($this->id, $this->id_cli, $this->id_tien, $this->total, $this->fecha,$this->id_pro);
        
    }
    public function crear(){
        $this->conexion->abrir();
        
        $this->conexion->ejecutar($this->ventaDAO->crear());//crear producto
        
        $this->conexion->cerrar();
    }
    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->productoDAO->consultar());
        $registro= $this->conexion->extraer();
        $id_cli = new Cliente($registro[0]);
        $id_cli -> consultar();
        $this->id_cli=$id_cli;
        $id_tien = new Tendero($registro[1]);
        $id_tien -> consultar();
        $this -> id_tien = $id_tien;
        $this->total=$registro[2];
        $this->fecha=$registro[3];
        $this->id_pro=$registro[4];
        $this->conexion->cerrar();
        
    }
    
    
    public function consultarTodos(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->consultarTodos());
        
        $ventas = array();
        while(($registro = $this -> conexion -> extraer()) != null){
            $id_cli = new Cliente($registro[1]);
            $id_cli -> consultar();
            $id_tien = new Tienda($registro[2]);
            $id_tien -> consultar();
            $this -> id_tien = $id_tien;
            $venta = new Venta($registro[0], $id_cli ,$id_tien, $registro[3],$registro[4],$registro[5]);
            array_push($ventas, $venta);
        }
        $this -> conexion -> cerrar();
        return  $ventas;
        
        
    }
    
    
    
    
    
}
?>