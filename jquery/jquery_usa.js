$(document).ready(function(){
    
$("#confirm_supplier").confirm({
    
    text: "Are you sure you want to delete that supplier?",
    title: "Confirmation required",
        confirmButton: "Yes ",
    cancelButton: "No",
    post: true
    
    
});


$("#confirm_categorie").confirm({
    
    text: "Are you sure you want to delete that categorie?",
    title: "Confirmation required",
        confirmButton: "Yes ",
    cancelButton: "No",
    post: true
    
    
});



    $(".seleccion").change(function() {
        
        var aux=$(this).val().split('-');
       
       $.ajax({
             url:$("#url").val() + "index.php/item/getProduct/" + this.value,
             
             dataType: 'html',
             success: function(data){
               
                 $('#id_producto_'+aux[2]).html(data);
                                  
                 
             }
           
       });
        //$('#div_producto_'+aux[2]).load($("#url").val() + "index.php/item/getProduct/" + this.value);
        
        
    });
    
        $(".sproducto").change(function() {
        
       
              $.ajax({
                    url:$("#url").val() + "index.php/item/setProductItem/" + this.value,             
                    dataType: 'html',
                    success: function(){  }
           
               });
       
       
        
        
    });




  
        $("#id_categorie_compare").change(function() {  
           
	  
	  $("#div_principal").load($("#url").val() + "index.php/compare/search/" + this.value+"/" + $("#search").val())  
	     
	   /*  var response;
	    $.ajax({ type: "GET",   
		url: $("#url").val() + "index.php/compare/search/" + this.value+"/" + $("#search").val(),   
		async: false,
		success : function(text)
		{
		    response= text;
		    
		}
	    });
	    //$("#div_principal").html(response);  
	      
	     $("#div_principal").html(response);*/
	     
           });   
	
	

        $("#div_search").click(function() {  
	      
	  var idc=($("#id_categorie_compare").val()>0)?$("#id_categorie_compare").val():"0";
	  
             $("#div_principal").load($("#url").val() + "index.php/compare/search/"+idc+"/" + $("#search").val())  
           });  

     
	
	
	   $(".tooltip4").popover({ trigger: "hover" ,
               title : 'It works in absence of title attribute.'
            });

	  // $(".pop3").popover({ trigger: "hover"     });
	   
	   $(document.body).on('mouseover','.pop3',function(){$(".pop3").popover({ trigger: "hover"     });});






    $("#sort_product").change(function() {  

          
            
            

           $("#div_principal").load($("#url").val() + "index.php/upload/editar_search/8/0/" + this.value) ; 
 
     
         
           });   
	   

});

