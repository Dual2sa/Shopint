<?php
class TiendaDAO{
    private $id;
   
    private  $cod;
    private $nombre;
   
    
    
    
    public function __construct($id,$cod,$nombre){
        $this->id=$id;
       
        $this->cod=$cod;
        $this->nombre=$nombre;
        
    
    }

    public  function consultar(){
        return "select  cod , nombre
                from tienda
                 where id_tienda= '". $this->id ."'" ;

                    
    }
    
    public function consultarTodos(){
        return "select id_tienda,  cod, nombre
                from tienda";
    }
}
?>