
    <div class="row-fluid">
    <div class="col-md-12 ">
        
        
            <legend>List of Files</legend>
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr>
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Name File</th>
                    <th>Date</th>
                   
                    <th align="center">Total Rows</th>
                    <th align="center">Unlinked</th>
                   
                    <th>Options</th>
                </tr>
                <?php
                  $i=1;
                  if(sizeof($files)>0)
                  {
                         $y=0;
                        while ( $y < sizeof($files)) {
                        
                       

                      if($files[$y]['unlink']>1)
                       {
                         $color_text="text-warning";
                       }


                       if($files[$y]['unlink']>10)
                       {
                         $color_text="text-danger";
                       }
 
                      if($files[$y]['unlink']==0)
                       {
                         $color_text="text-success";
                       }



                      ?>
                      <tr>
                          <td><?= $i;?></td>
                          <td><?=$files[$y]['proveedor'];?></td>
                          <td><?=$files[$y]['nombre'];?></td>
                          <td><?=$files[$y]['fecha'];?></td>
                          <td align="center"><?=$files[$y]['row'];?></td>
                          <td align="center"><strong class="<?= $color_text;?>"> <?=$files[$y]['unlink'];?></strong> </td>
                          
                                  <td><div class="row-fluid">

                                          <a href="<?= base_url()?>index.php/upload/editar_file/<?=$files[$y]['id_archivo'];?>"   class="btn btn-success  btn-xs">Edit</a>
                                          <a href="<?= base_url()?>index.php/categorie/eliminar/<?=$files[$y]['proveedor'];?>" class="btn btn-warning btn-xs confirm" id="confirm_categorie">Delete</a>

                              </div></td>
                      </tr>
                      <?php
                        $i++;
                        $y++;
                        }
                  }
                ?>
            </table>
          
        </div>
        
    </div>

    <div class="row-fluid">
      <div class="col-md-4"></div>
      <div class="col-md-4" > <h4 ><?= $links;?></h4></div>
      <div class="col-md-4"></div>

    </div>
     
