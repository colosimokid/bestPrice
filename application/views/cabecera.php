<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <title>bestPrice!</title>
        <link rel="stylesheet" href="<?= base_url()?>boot/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?= base_url()?>boot/css/bootstrap-theme.css"/>
        <script  src="<?= base_url()?>jquery/jquery-1.10.2.js"></script>
        <script  src="<?= base_url()?>boot/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?= base_url()?>estilo.css"/>
        <script  src="<?= base_url()?>jquery/jquery.confirm.js"></script>
        <script  src="<?= base_url()?>jquery/jquery_usa.js"></script>
        
        

</head>
<body>
   
    

       <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#" >EspañaOrder!</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= base_url()?>index.php/compare" >Compare</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" >File
                  <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url()?>index.php/upload" >Upload</a></li>
                <li><a href="<?= base_url()?>index.php/upload/file" >Files</a></li>
                            
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Configurations 
                  <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url()?>index.php/supplier" >Suppliers</a></li>
                <li><a href="<?= base_url()?>index.php/categorie" >Categories</a></li>
                <li><a href="<?= base_url()?>index.php/item" >Products</a></li>
                
                <li class="divider"></li>
                <li class="dropdown-header" >Products</li>
                <li><a href="#" >Association Product</a></li>
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="container" >
    
      <input type="hidden"  id="url" value="<?= base_url();?>"/>
    

