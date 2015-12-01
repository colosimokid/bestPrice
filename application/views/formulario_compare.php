

      <legend>Compare Price</legend>
        <div class="row-fluid">

          
          <div class="col-md-3">

            <label for="supplier">Categorie</label>
            <select name="id_categorie_compare" id="id_categorie_compare" class="form-control" required>
                     <option value="">All</option>
                     <?php
                     if($categorie)
                        {
                       foreach($categorie->result() as $dat)
                       {
                             $select="";
                            if($id_categorie==$dat->id_categoria)
                            {
                                $select="selected";
                            }
                     ?>
                     <option value="<?= $dat->id_categoria;?>" <?= $select;?> ><?= $dat->nombre;?></option>
                     <?php

                          }
                        }
                     ?>
                 </select>

          </div>

            <div class="row-fluid">
            <div class="col-md-1"> </div>
            <div class="col-md-3">

                   <label for="buscar">Search</label>
                 
                
                    <div class="input-group add-on" >
                      <input type="text" class="form-control" placeholder="Search product" name="search" id="search" value="<?= $search;?>">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="div_search"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                    </div>
                  
              
            </div>
            <div class="col-md-5 "  > 
            
            
                 
                <button type="button" class="btn btn-default">  
                  <span class="glyphicon glyphicon-print"></span>  Print  
                 </button>  


            </div>
           </div>

        </div>
  

       <div class="col-md-12">&nbsp;</div>


         <div id="div_principal">
  
                 <?php
                 
                 include("formulario_compare_table.php");
                 
                 
                 ?>
  
            </div>
  
  

 
