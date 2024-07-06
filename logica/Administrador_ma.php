<?php
require_once 'persistencia/Conexion.php';//importar conexion
require_once 'persistencia/Administrador_maDAO.php';//importar AdmistradorDao
class Administrador_ma{
    private $id;
    private $nombre;
    private  $usuario;
    private  $clave;
    private  $conexion;
    private  $administrador_maDAO;
    
    
    
    
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
        $this->administrador_maDAO=new Administrador_maDAO($this->id, $this->nombre, $this->usuario, $this->clave);
        
    }
    public  function autenticar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administrador_maDAO->autenticar());
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
        $this->conexion->ejecutar($this->administrador_maDAO->consultar());
        $this->conexion->cerrar();
        $datos= $this->conexion->extraer();
        $this->nombre=$datos[0];
        $this->usuario=$datos[1];
    }
   
}
?>