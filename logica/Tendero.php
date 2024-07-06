<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/TenderoDAO.php';
class Tendero{
    private $id;
    private $nombre;
    private  $usuario;
    private  $clave;
    private  $conexion;
    private  $tenderoDAO;
    
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
    
    public function __construct($id="", $nombre="", $usuario="", $clave=""){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->usuario=$usuario;
        $this->clave=$clave;
        $this->conexion= new Conexion();
        $this->tenderoDAO=new TenderoDAO($this->id, $this->nombre, $this->usuario, $this->clave);
        
    }
    public  function autenticar(){
        $this->conexion->abrir();
        
        $this->conexion->ejecutar($this->tenderoDAO->autenticar());
        $this->conexion->cerrar();
        if ($this->conexion->numFilas()==1){
            $this->id= $this->conexion->extraer()[0];
            return true;
        }
        else {
            return false;
        }
        
        
    }
    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tenderoDAO->consultar());
        
        $datos= $this->conexion->extraer();
        $this->nombre=$datos[0];
        $this->usuario=$datos[1];

        $this->conexion->cerrar();
    }
    public function consultarTodos(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tenderoDAO->consultarTodos());
        
        $datos= $this->conexion->extraer();
        $this->id=$datos[0];
        $this->nombre=$datos[1];
        $this->usuario=$datos[2];
        
        $this->conexion->cerrar();
    }
    public function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tenderoDAO->crear());//crear producto
        $this->conexion->cerrar();
    }
    
}
?>