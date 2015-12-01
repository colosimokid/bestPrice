
    <input type="hidden"  id="url" value="<?= base_url();?>"/>
    <legend><?= $supplier;?> </legend>
  
            <div class="row-fluid">

          
          <div class="col-md-3">
   <h6>Date: <?= $fecha;?></h6>
      

          </div>

            
            <div class="col-md-1"> </div>
           
            <div class="col-md-3"  > 
           
                     <label for="supplier">Sort Products By</label>
                     <select name="sort_product" id="sort_product" class="form-control" required>
                         <option value="">All</option>
                         <option value="1">Linked</option>
                         <option value="2">Unlinked</option>                 
                      </select>
             


            </div>


           <div class="col-md-5"></div>

        </div>

     <div id="div_principal">


        <?php include("formulario_producto_table.php");?>

      </div>
    
