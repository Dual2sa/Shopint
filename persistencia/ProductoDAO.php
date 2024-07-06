
<?php
class ProductoDAO{
    private $id;
    private  $id_tien;
    private  $nombre;
    private  $imagen;
    private  $valor;
    private  $cantidad;
    private  $descripcion;
     
    public function setId_tien($id_tien)
    {
        $this->id_tien = $id_tien;
    }
    
    public function __construct($id, $id_tien, $nombre, $imagen, $valor, $cantidad, $descripcion){
        $this->id=$id;
        $this->id_tien=$id_tien;
        $this->nombre=$nombre;
        $this->imagen=$imagen;
        $this->valor=$valor;
        $this->cantidad=$cantidad;
        $this->descripcion=$descripcion;
       
        
    }
    public function consultar(){
        return "select t_id_Tienda, nombre, imagen, valor, cantidad, descripcion
                from producto
                where id_prod = ' " . $this -> id . " ' ";
    }
    
    public function consultarTodos(){
        return "select id_prod,t_id_Tienda, nombre, imagen, valor, cantidad, descripcion
                from producto";
    }

    //Funcion para consultar los productos de cada tienda en especifico
    public function consultarProTienda(){
        return "select id_prod,t_id_Tienda, nombre, imagen, valor, cantidad, descripcion
                from producto
                where t_id_Tienda = '". $this->id_tien. "' ";
    }
    public function consultarMonto(){
        return "select valor
                from producto
                where id_prod = '". $this->id. "' ";
    }
   
    public function crear(){//sentencia para crear producto //incompleta
        
       return "insert into producto (id_prod, t_id_Tienda, nombre, imagen, valor, cantidad, descripcion) 
        values('".$this->id."', '".$this->id_tien."', '".$this->nombre."', '".$this->imagen."', '".$this->valor."', '".$this->cantidad."', '". $this->descripcion."')";
    }
}
?>