
    
    <table class="table table-bordered table-striped table-hover table-condensed">
         
          <tr>
              <th class="col-sm-1" ></th>
              
              <?php


               foreach ($proveedor as $sup) {
                
               

              ?>
              <th colspan="2" class="col-sm-1" style="text-align:center" ><?= $sup['nombre'];?></th>
   
              <?php
                }
              ?>
              
              
          </tr>

          <tr>
              <th>Producto</th>
              
              
                <?php


               foreach ($proveedor as $sup) {
                
               

              ?>
               <th style="text-align:center">Size</th>
              <th style="text-align:center">Price</th>
   
              <?php
                }
              ?>            
              
              
          </tr>
          
      
         

    <?php



           $i=0;
         foreach ($producto as $pro) {
          
            $j=0;


    ?>




          <tr>
              <td><?= $pro['nombre'];?></td>

                <?php


               foreach ($proveedor as $sup) {
                $best_price="";
                if($lista[$i][$j]['best_price']==1)
                {
                   $best_price="<br/><b>Plus:</b>Best Price!";
                }

              ?>
                <td style="text-align:center">
			  <?= $lista[$i][$j]['size'];?>
			  
			  </td>
              <td style="text-align:center"><div class="pop3" 
                                  
			  data-toggle="popover" 
			  data-placement="left"
			  data-title="<?= $sup['nombre'];?>  " 
			  data-html="true" 
			  data-content="<b>Description:</b><?= $lista[$i][$j]['descripcion'];?><br><b>Brand:</b><?= $lista[$i][$j]['marca'];?><?= $best_price;?>"><?= $lista[$i][$j]['price'];?>


                 <?php
                  
                  if($lista[$i][$j]['best_price']==1)
                  {

                 ?>
                 <span class="glyphicon glyphicon glyphicon-ok icon-success"></span>
            </td>
                
                 <?php

                  }
                 ?>
                 </div>

              <?php
                $j++;
                }
              ?>           
       
          </tr>
          <?php
            $i++;
          }
          ?>
      </table>
      
         <div class="row-fluid">
      <div class="col-md-4"></div>
      <div class="col-md-4" > <h4 ><?= $links;?></h4></div>
      <div class="col-md-4"></div>
    </div>