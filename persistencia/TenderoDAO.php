<?php
class TenderoDAO{
    private $id;
    private $nombre;
    private  $usuario;
    private  $clave;
    
    
    
    public function __construct($id, $nombre, $usuario, $clave){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->usuario=$usuario;
        $this->clave=$clave;
       
    }
    public  function autenticar(){//sentencia autenticar cliente
        return "select id_tendero
                from tendero
                where usuario= '". $this-> usuario . "' and clave =md5('". $this-> clave. "')";
    }
    public  function consultar(){
        return "select nombre, usuario
                from tendero
                    where id_tendero= '". $this->id ."'" ;
    }
    public  function consultarTodos(){
        return "select id_tendero, nombre, usuario
                from tendero
                    " ;
    }
    public function crear(){//sentencia para crear producto //incompleta
        
        return "INSERT INTO tendero (nombre, usuario, clave) VALUES ('".$this->nombre."','".$this->usuario."', md5('".$this->clave."'))";
    }
    
}
?>