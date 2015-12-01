<form action="<?= base_url() ?>index.php/upload/select_row" method="post" accept-charset="utf-8" >






        <legend>Detail of File</legend>
        <div class="row-fluid">

            <div class="col-md-2">

                <label for="row">Row Start</label>
                <select name="row" id="row" class="form-control">
                    <?php
                    $i = 1;
                    while ($i <= 20) {
                        ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php
                        $i++;
                    }
                    ?>

                </select>
            </div>
            <div class="col-md-10" ><img src="<?= base_url(); ?>/img/row.jpg" alt=""  height="60" /></div>
        </div>







        

    </div>          

    <div class="container">    
        <div class="row-fluid">
            <div class="col-md-2">

                <label for="id_producto">Product Id</label>
                <select name="id_producto" id="id_producto" class="form-control">
                    <?php
                    $i = 'A';
                    $y=1;
                        while ($y <= 27) {
                         ?>
                        <option value="<?= $y; ?>"><?= $i; ?></option>
                        <?php
                        $y++;
                        $i++;
                    }
                    ?>

                </select>
            </div>


            <div class="col-md-2">
                <label for="row">Brand</label>
                <select name="marca" id="marca" class="form-control">
                        <?php
                        $i = 'A';
                        $y=1;
                        while ($y <= 27)  {
                         ?>
                        <option value="<?= $y; ?>"><?= $i; ?></option>
                        <?php
                        $y++;
                        $i++;
                        }
                        ?>

                </select>
            </div>

            <div class="col-md-2">
                <label for="tamano">size</label>
                <select name="tamano" id="tamano" class="form-control">
                    <?php
                    $i = 'A';
                    $y=1;
                        while ($i <= 'Z') {
                         ?>
                        <option value="<?= $y; ?>"><?= $i; ?></option>
                        <?php
                        $y++;
                        $i++;
                    }
                    ?>

                </select>

            </div>


            <div class="col-md-2">
                <label for="description">Description</label>
                <select name="descripcion" id="descripcion" class="form-control">
                    <?php
                    $i = 'A';
                    $y=1;
                        while ($y <= 27)  {
                         ?>
                        <option value="<?= $y; ?>"><?= $i; ?></option>
                        <?php
                        $y++;
                        $i++;
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-2">
                <label for="precio">Price</label>
                <select name="precio" id="precio" class="form-control">
                        <?php
                        $i = 'A';
                        $y=1;
                        while ($y <= 27) {
                         ?>
                        <option value="<?= $y; ?>"><?= $i; ?></option>
                        <?php
                        $y++;
                        $i++;
                    }
                    ?>

                </select>
            </div>
            <div class="col-md-1"></div>
        </div> 

    </div> 
<br />
<div class="container">
    <div class="col-md-5"></div>
    <div class="col-md-2">
        
        <input type="submit" class="btn btn-primary" value="Read File" />
        
    </div>
    <div class="col-md-5"></div>



<input type="hidden" value="<?= $id_archivo;?>"  name="id_archivo"  id="id_archivo"/>
</form>   






   
