
<?php
class VentaDAO{
    private $id;
    private  $id_cli;
    private  $id_tien;
    private  $total;
    private  $fecha;
   private $id_prod;
     
   
    
    public function __construct($id, $id_cli, $id_tien,$total, $fecha,$id_prod){
        $this->id=$id;
        $this->id_cli=$id_cli;
        $this->id_tien=$id_tien;
        $this->total=$total;
        $this->fecha=$fecha;
        $this->id_prod=$id_prod;
     
       
        
    }
    public function consultar(){
        return "SELECT  cl_id_cliente, te_id_tendero, total, fecha_venta, id_prod FROM ventas WHERE id_venta= ".$this -> id . "'";
    }
    
    public function consultarTodos(){
        return "SELECT id_venta, cl_id_cliente, te_id_tendero, total, fecha_venta, id_prod  FROM ventas ";
    }
   
    public function crear(){//sentencia para crear producto //incompleta
        
       return "insert into ventas (cl_id_cliente,  te_id_tendero, total, fecha_venta,id_prod ) 
        values('".$this->id_cli."', '".$this->id_tien."', '".$this->total."', '".$this->fecha."', '".$this->id_prod."')";
    }
}
?>