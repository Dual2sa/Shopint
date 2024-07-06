<?php include 'presentacion/vistaAdm.php';
$producto = new Producto();
$productos= $producto->consultarTodos();
?>
<div class="container">
    <div class="row mt-3">
        
        <div class="col-12">
            <div class="card">
                <h3 class="card-header text-center">Consultar Producto</h3>
                <div class="card-body">
    <table class="table table-hover">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>NOMBRE</th>
                 <th>TIENDA</th>
                 <th>IMAGEN</th>
                 <th>VALOR</th>
                 <th>STOCK</th>
                 <th>DESCRIPCION</th>
                 <th>Acciones</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($productos as $productoActu) {
             ?>
             <tr>
             	 <td><?php echo $productoActu->getId()?></td>
                 <td><?php echo $productoActu->getNombre()?></td>
                 <td><?php echo $productoActu->getId_tien()->getNombre()?></td>
                 <td>
                    <img src="presentacion/img/<?php echo $productoActu->getImagen();?>" width="150" height="150" alt=""/>
                    

                     </td>
                 <td><?php echo $productoActu->getValor();?></td>
                 <td><?php echo $productoActu->getCantidad();?></td>
                 <td><?php echo $productoActu->getDescripcion();?></td>
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