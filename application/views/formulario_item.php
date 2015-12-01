
    
    <div class="col-md-3">
        
        
     <?
       if($accion=='add')
       {
     ?>
        <form action="<?= base_url()?>index.php/item/guardar/" method="post">
            <legend>Add Product</legend>
            <label for="supplier">Categorie</label>
            <select name="id_categorie" id="id_categorie" class="form-control" required>
                     <option value="">Select</option>
                     <?php
                     if($categorie)
                        {
                       foreach($categorie->result() as $dat)
                       {
                     ?>
                     <option value="<?= $dat->id_categoria;?>"><?= $dat->nombre;?></option>
                     <?php
                        }
                        }
                     ?>
                 </select>
            <label for="nombre">Name</label>
            <input type="input" class="form-control" placeholder="Name" required autofocus name="nombre" ></label>
            
            <br />
              <input type="submit"  class="btn btn-primary btn-block"  value="Add"/>
        </form>
      <?
         }
      ?>
      
      
      
           <?
       if($accion=='edit')
       {
     ?>
        <form action="<?= base_url()?>index.php/item/update/" method="post">
            <legend>Edit Product</legend>
            <label for="supplier">Categorie</label>
                 <select name="id_categorie" id="id_categorie" class="form-control">
                     <option value="">Select</option>
                     <?php
                       foreach($categorie->result() as $dat)
                       {
                     ?>
                     <option value="<?= $dat->id_categoria;?>" <?php if($id_categoria==$dat->id_categoria){?>selected<?php }?>><?= $dat->nombre;?></option>
                     <?php
                        }
                     ?>  
                     </select>
            <label for="nombre">Name</label>
            
            <input type="input" class="form-control" placeholder="Name" required autofocus name="nombre" value="<?= $nombre;?>"></label>
            
            <br />
            <input type="hidden"  value="<?= $id_item;?>" name="id_item"/> 
              <input type="submit"  class="btn  btn-success btn-block"  value="Edit"/>
        </form>
      <?
         }
      ?>
     </div>
    
    <div class="col-md-1">
        
    </div>
    
    <div class="col-md-8 ">
        
        <div class="row-fluid">
            <legend>List of Products</legend>
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Categorie</th>
                    <th>Options</th>
                </tr>
                <?php
                  $i=1;
                  if($product)
                  {
                        foreach($product->result() as $dat)
                        {

                      ?>
                      <tr>
                          <td><?= $i;?></td>
                          <td><?=$dat->producto;?></td>
                          <td><?=$dat->categoria;?></td>
                          
                                  <td><div class="row-fluid">

                                          <a href="<?= base_url()?>index.php/item/editar/<?=$dat->id_item;?>"   class="btn btn-success  btn-xs">Edit</a>
                                          
                                          <a href="<?= base_url()?>index.php/item/eliminar/<?=$dat->id_item;?>" class="btn btn-warning btn-xs confirm" id="confirm_categorie">Delete</a>

                              </div></td>
                      </tr>
                      <?php
                        $i++;
                        }
                  }
                ?>
            </table>
            
        </div>
        
    </div>
