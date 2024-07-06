<?php
require_once 'persistencia/Conexion.php';
require_once 'persistencia/ClienteDAO.php';
class Cliente{
    private $id;
    private $nombre;
    private  $usuario;
    private  $clave;
    private  $conexion;
    private  $clienteDAO;
    
    
    
    
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
        $this->clienteDAO=new ClienteDAO($this->id, $this->nombre, $this->usuario, $this->clave);
        
    }
    public  function autenticar(){
        $this->conexion->abrir();
        
        $this->conexion->ejecutar($this->clienteDAO->autenticar());
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
        $this->conexion->ejecutar($this->clienteDAO->consultar());
        $this->conexion->cerrar();
        $datos= $this->conexion->extraer();
        $this->nombre=$datos[0];
        $this->usuario=$datos[1];
    }
    public function consultarTodos(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->consultarTodos());
        
        $clientes = array();
        while(($registro = $this -> conexion -> extraer()) != null){
            $cliente = new Cliente($registro[0], $registro[1],$registro[2]);
            array_push($clientes, $cliente);
        }
        $this -> conexion -> cerrar();
        return  $clientes;
        
        
    }
    public function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->crear());//crear producto
        $this->conexion->cerrar();
    }
    
}
?>