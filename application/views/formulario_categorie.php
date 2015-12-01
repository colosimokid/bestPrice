
  
    
    <div class="col-md-3">
        
        
     <?
       if($accion=='add')
       {
     ?>
        <form action="<?= base_url()?>index.php/categorie/guardar/" method="post">
            <legend>Add Categorie</legend>
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
        <form action="<?= base_url()?>index.php/categorie/update/" method="post">
            <legend>Edit Categorie</legend>
            <label for="nombre">Name</label>
            <input type="input" class="form-control" placeholder="Name" required autofocus name="nombre" value="<?= $nombre;?>"></label>
            
            <br />
            <input type="hidden"  value="<?= $id_categoria;?>" name="id_categoria"/> 
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
            <legend>List of Categories</legend>
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                   
                    <th>Options</th>
                </tr>
                <?php
                  $i=1;
                  if($supplier)
                  {
                        foreach($supplier->result() as $dat)
                        {

                      ?>
                      <tr>
                          <td><?= $i;?></td>
                          <td><?=$dat->nombre;?></td>
                          
                                  <td><div class="row-fluid">

                                          <a href="<?= base_url()?>index.php/categorie/editar/<?=$dat->id_categoria;?>"   class="btn btn-success  btn-xs">Edit</a>
                                          <a href="<?= base_url()?>index.php/categorie/eliminar/<?=$dat->id_categoria;?>" class="btn btn-warning btn-xs confirm" id="confirm_categorie">Delete</a>

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
