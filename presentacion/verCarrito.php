<?php include 'presentacion/vistaCli.php';
$carrito = new Carrito();
$carritos= $carrito->consultarTodos();
?>
<div class="container">
    <div class="row mt-3">
        
        <div class="col-12">
            <div class="card">
                <h3 class="card-header text-center">Consultar Carrito</h3>
                <div class="card-body">
    <table class="table table-hover">
         <thead>
             <tr>
                 <th>Item</th>
                 <th>NOMBRE</th>
                 
                 
                 <th>CANTIDAD</th>
                 <th>VALOR</th>
                 
                 <th>Acciones</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($carritos as $productoActu) {
             ?>
             <tr>
             	 <td><?php echo $productoActu->getId()?></td>
                  <td><?php //echo $productoActu->getId_prod()?></td>
                  <td><?php echo $productoActu->getCantidad()?></td>
                  <td><?php echo $productoActu->getMonto()?></td>
                 
                 <td>
                    
                    

                 </td>
             </tr>
            <?php }?>
             
          <!-- /*  foreach ($productos as $productoActu){
                 echo "<tr>";
                 echo "<td>". $i++. "</td>";
                 echo "<td>". $productoActu->getNombre(). "</td>";
                 echo "<td>".$productoActu->getId_tien()->getNombre(). "</td>";
                 echo "<td>"."<img src=    />"."</td>";
                 echo "<td>". $productoActu->getValor(). "</td>";
                 echo "<td>". $productoActu->getCantidad(). "</td>";
                 echo "<td>". $productoActu->getDescripcion(). "</td>";
               
                 echo "</tr>";
                 
            }/*/ --> 
            
           
            
         </tbody>
     </table>

                </div>
            </div>
    </div>
</div>