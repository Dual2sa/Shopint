
<?php
class CarritoDAO{
    private $id;
    private $id_prod;
    private  $nombre;
    private  $cantidad;
    private  $monto;
    
     
    public function setId_tien($id_tien)
    {
        $this->id_tien = $id_tien;
    }
    
    public function __construct($id, $id_prod, $nombre,$cantidad, $monto){
        $this->id=$id;
        $this->id_prod=$id_prod;
        $this->nombre=$nombre;
        $this->cantidad=$cantidad;
        $this->monto=$monto;
        
    }
    public function consultar(){
        return "select id_prod,nombre, cantidad, monto FROM carrito WHERE id_carrito = ' " . $this -> id . " ' ";
    }
    
    public function consultarTodos(){
        return "select id_carrito, id_prod, nombre,cantidad, monto FROM carrito";
    }

    //Funcion para consultar los productos de cada tienda en especifico
   
    public function crear(){//sentencia para crear producto //incompleta
        
        return "insert into carrito (id_prod, nombre,cantidad, monto) 
            values('".$this->id_prod."', '".$this->nombre."', '".$this->cantidad."', '".$this->monto."')";
    }
}
?>