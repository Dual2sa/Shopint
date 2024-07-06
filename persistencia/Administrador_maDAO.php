<?php
class Administrador_maDAO{
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
    public  function autenticar(){
        return "select id_admin 
                from administrador_ma 
                where usuario= '". $this-> usuario . "' and clave =md5('". $this-> clave. "')";
    }
    public  function consultar(){
        return "select nombre, usuario
                from administrador_ma
                    where id_admin= '". $this->id ."'" ;
    }
}
?>