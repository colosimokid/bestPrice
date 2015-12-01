  <table class="table table-bordered table-striped table-hover table-condensed">
        <tr>
            <th>Id Producto</th>
            
            <th>Description</th>
            <th>Size</th>
            <th>Price</th>
            <th>Categorie</th>
            <th>Product</th>
            <th>Options</th>
            
        </tr>
        
        <?php
        $i=1;
        $y=0;
         while($y < sizeof($producto))
         {
        
        ?>
        <tr>
            <td><?= $producto[$y]['codigo'];?></td>
            
            <td><?= $producto[$y]['descripcion'];?></td>
            <td><?= $producto[$y]['tamano'];?></td>
            <td><?= $producto[$y]['precio'];?></td>
            <td> 
                <div id="div_categoria_<?= $i;?>">
                    <select name="id_categoria" id="id_categoria" class="form-control seleccion" required   >
                                <option value="">Select</option>
                                    <?php
                                    $opt = "";
                                    foreach ($categoria->result() as $cat) {
                                        $selected='';
                                        if($producto[$y]['id_categoria']==$cat->id_categoria)
                                        {
                                            $selected='selected';
                                        }
                                        $opt.='<option value="' . $cat->id_categoria . '-' . $producto[$y]['id_producto'] . '-' . $i . '"  '.$selected.'>' . $cat->nombre . '</option>';
                                    }
                                    ?>
                                    <?= $opt; ?>
                        </select>
                 </div>
            </td>
              <td> 
                <div id="div_producto_<?= $i;?>">
                        <select  id="id_producto_<?= $i;?>" class="form-control sproducto" required >
                                
                                <?= $producto[$y]['items'];?>                                
                                   
                        </select>
                 </div>
            </td>
            <td>
                
                
                     
                     <a href="<?= base_url()?>index.php/categorie/eliminar/" class="btn btn-warning btn-xs confirm" id="confirm_categorie">Delete</a>

                
                               
                
                
            </td>
        </tr>
        <?php
             $i++;
             $y++;
        }
        ?>
    </table>

       <div class="row-fluid">
      <div class="col-md-4"> <input type="hidden"  id="pos_table" value="<?= $pos_table; ?>"/></div>
      <div class="col-md-4" > <h4 ><?= $links; ?></h4></div>
      <div class="col-md-4"></div>  