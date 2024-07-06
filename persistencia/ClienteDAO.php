<?php
class ClienteDAO{
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
        return "select id_cliente
                from cliente
                where usuario= '". $this-> usuario . "' and clave =md5('". $this-> clave. "')";
    }
    public  function consultar(){
        return "select nombre, usuario
                from cliente
                    where id_cliente= '". $this->id ."'" ;
    }
    public function crear(){//sentencia para crear producto //incompleta
        
        return "INSERT INTO cliente (nombre, usuario, clave) VALUES ('".$this->nombre."','".$this->usuario."', md5('".$this->clave."'))";
    }
    public function consultarTodos(){
        return "SELECT id_cliente, nombre, usuario FROM cliente";
    }
}
?>