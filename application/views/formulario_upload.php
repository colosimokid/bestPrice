
    
    <div class="row-fluid">
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
            <legend>Upload Product List</legend>

                    
             <form action="<?= base_url()?>index.php/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">   
                 <label for="supplier">Supplier</label>
                 <select name="id_proveedor" id="id_proveedor" class="form-control">
                     <option value="">Select</option>
                     <?php
                       foreach($supplier->result() as $dat)
                       {
                     ?>
                     <option value="<?= $dat->id_proveedor;?>"><?= $dat->nombre;?></option>
                     <?php
                        }
                     ?>
                 </select>
                 
                 <label for="userfile">File .xls</label>
                 <input type="file" name="userfile" size="20"  class="form-control"  required />   
                 <input type="submit" value="upload" class="btn btn-primary btn-block" />
             </form>

        </div>
        
        <div class="col-md-3"></div>
    </div>
