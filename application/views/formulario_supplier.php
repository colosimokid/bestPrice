
  
    
    <div class="col-md-3">
        
        
     <?
       if($accion=='add')
       {
     ?>
        <form action="<?= base_url()?>index.php/supplier/guardar/" method="post">
            <legend>Add Supplier</legend>
            <label for="nombre">Name</label>
            <input type="input" class="form-control" placeholder="Name" required autofocus name="nombre" ></label>
            <label for="nombre">Phone</label>
            <input type="input" class="form-control" placeholder="Phone" required name="telefono" >
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
        <form action="<?= base_url()?>index.php/supplier/update/" method="post">
            <legend>Edit Supplier</legend>
            <label for="nombre">Name</label>
            <input type="input" class="form-control" placeholder="Name" required autofocus name="nombre" value="<?= $nombre;?>"></label>
            <label for="nombre">Phone</label>
            <input type="input" class="form-control" placeholder="Phone" required name="telefono" value="<?= $telefono?>">
            <br />
            <input type="hidden"  value="<?= $id_proveedor;?>" name="id_proveedor"/> 
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
            <legend>List of Suppliers</legend>
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
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
                          <td><?=$dat->telefono;?></td>
                                  <td><div class="row-fluid">

                                          <a href="<?= base_url()?>index.php/supplier/editar/<?=$dat->id_proveedor;?>"   class="btn btn-success  btn-xs">Edit</a>
                                          <a href="<?= base_url()?>index.php/supplier/eliminar/<?=$dat->id_proveedor;?>" class="btn btn-warning btn-xs confirm" id="confirm_supplier">Delete</a>

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
