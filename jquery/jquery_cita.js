// JavaScript Document

$(document).ready(function(){


 $.validator.addMethod("reg_telefono", function(value, element) 
{ 
return this.optional(element) || /^[0]{1}[1-9]{3}[-][0-9]{7}$/i.test(value); 
}, ".");  


 $.validator.addMethod("reg_rif", function(value, element) 
{ 
return this.optional(element) || /^[JGVE][-][0-9]{8}[-][0-9]$/i.test(value); 
}, ".");      
    







//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    //MENU
	
	
	//menu_archivo
    $("#archivo").click(function(event){
	   event.preventDefault();
	   $("#div_auxiliar").hide("blind",200);
	   $("#div_final").hide("slide",200);
	   //--!
	   $("#div_general").hide("blind",200,function(){	
	   
				  $("#div_general" ).load( "ver/menu_archivo.php",function(){	
						$("#div_general").toggle("blind",500);
				
					} );	
				    
		      });	
	   //--!
	   });
	   
	//menu_reporte
    $("#reporte").click(function(event){
	   event.preventDefault();
	   $("#div_auxiliar").hide("blind",200);
	   $("#div_final").hide("slide",200);
	   //--!
	   $("#div_general").hide("blind",200,function(){	
	   
				  $("#div_general" ).load( "ver/menu_reporte.php",function(){	
						$("#div_general").toggle("blind",500);
				
					} );	
				    
		      });	
	   //--!
	   });	   
	   
	   
	//menu Mantenimiento
    $("#mantenimiento").click(function(event){
	   event.preventDefault();
	   $("#div_auxiliar").hide("blind",200);
	   $("#div_final").hide("slide",200);
	   //--!
	   $("#div_general").hide("blind",200,function(){	
				  $("#div_general" ).load( "ver/menu_mantenimiento.php",function(){
					
						$("#div_general").toggle("blind",500);															 
					} );	
				    
		  });
		//--!
	   });	 
	   
	 //boton  menu medico para ver  
	 $("#div_general").on('click' ,'#mn_medico',function(event){
	    event.preventDefault();
		$("#div_auxiliar").hide("blind",300);
		$("#div_final").hide("slide",200);
	     $("#div_auxiliar" ).load( "ver/medico.php",function(){
		
		  $("#div_auxiliar").toggle("blind",400);
		} );
	 
	 }); 
	 
	 //Agregar medico 
	 $("#div_auxiliar").on('click' ,'#agregar_medico',function(event){
	    event.preventDefault();
		
	     $("#div_final" ).load( "agregar/medico.php",function(){
		
		  $("#div_final").toggle("slide",400);
		  	 //-----
    $("#fr_medico").validate({
			
			      rules:{
				  
				       'nombre': 'required',
					   'apellido': 'required',
					   'cedula': 'required',
					   'telefono': 'required',
					   'correo': 'required'
					   
					   
				  
				  },
				  
				  messages:{
				  
				       'nombre': 'Obligatorio',
					   'apellido': 'Obligatorio',
					   'cedula': 'Obligatorio',
					   'telefono': 'Obligatorio',
					   
					   'correo': 'Obligatorio'
				  
				  },
			       
				  debug:true,
				  
				  submitHandler:function(form){
				  
				  
				  
				  				$.ajax({   
							type: 'POST',   
							url: 'acciones.php',   

						data: {accion:'guardar_medico',nombre:$("#nombre").val(),apellido:$("#apellido").val(),cedula:$("#cedula").val(),telefono:$("#telefono").val(),correo:$("#correo").val(),especialidad:$("#especialidad").val()} ,
							  success: function(){
							 $("#div_auxiliar" ).load( "ver/medico.php");
							 $("#div_final").hide("slide",400);
							   }
							  
							});	
				  
				  }
			
			
			
			});
				 
		 //----¡
		} );
	 
	 });  
	 
	    
	
	// boton menu seguro ver
	 $("#div_general").on('click' ,'#mn_seguro',function(event){
	    event.preventDefault();
		$("#div_auxiliar").hide("blind",300);
		$("#div_final").hide("slide",200);
	    $("#div_auxiliar" ).load( "ver/seguro.php",function(){
		
		  $("#div_auxiliar").toggle("blind",400);
		  
		  
		  
		  
		} );	

	 
	 }); 
	 







	 //Agregar seguro
	 $("#div_auxiliar").on('click' ,'#agregar_seguro',function(event){
	    event.preventDefault();
		
	     $("#div_final" ).load( "agregar/seguro.php",function(){
		
		  $("#div_final").toggle("slide",400);
		  
		  
		
		
		
		    $("#fr_seguro").validate({
			
			      rules:{
				  
				       'nombre': 'required',
					   'rif': {required:true,remote:{url:"acciones.php?accion=rif_seguro",type:"post",async: false},reg_rif:true},
					   'telefono': {required:true,reg_telefono:true},
					   'direccion': 'required'
				  
				  },
				  
				  messages:{
				  
				       'nombre': 'Obligatorio',					            
					   'rif': {required:'Obligatorio',remote:'Ya existe este rif',reg_rif:'J-00000000-0'},
					   'telefono': '0414-000000',
					   'direccion': 'Obligatorio'
				  
				  },
			       
				  debug:true,
				  
				  submitHandler:function(form){
				  
				  
				  
				  				$.ajax({   
							type: 'POST',   
							url: 'acciones.php',   

						data: {accion:'guardar_seguro',nombre:$("#nombre").val(),rif:$("#rif").val(),telefono:$("#telefono").val(),direccion:$("#direccion").val()} ,
							  success: function(){
							 $("#div_auxiliar" ).load( "ver/seguro.php");
							 $("#div_final").hide("slide",400);
							   }
							  
							});	
				  
				  }
			
			
			
			});
		
		
		

	 
	
		
		  
		  
		} );
	 
	 });  	 
	 
	
	
	
	
	
	// boton menu especialidad ver
	 $("#div_general").on('click' ,'#mn_especialidad',function(event){
	    event.preventDefault();
		$("#div_auxiliar").hide("blind",300);
		$("#div_final").hide("slide",200);
	    $("#div_auxiliar" ).load( "ver/especialidad.php",function(){
		
		  $("#div_auxiliar").toggle("blind",400);
		} );	

	 
	 });  
	 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 
	 
	 //Agregar especialidad
	 $("#div_auxiliar").on('click' ,'#agregar_especialidad',function(event){
	    event.preventDefault();
		
	     $("#div_final" ).load( "agregar/especialidad.php",function(){
		
		  $("#div_final").toggle("slide",400);
		
		 
		 
		 //-----
    $("#fr_especialidad").validate({
			
			      rules:{
				  
				       'especialidad': 'required'
					   
				  
				  },
				  
				  messages:{
				  
				       'especialidad': 'Obligatorio'
				  
				  },
			       
				  debug:true,
				  
				  submitHandler:function(form){
				  
				  
				  
				  				$.ajax({   
							type: 'POST',   
							url: 'acciones.php',   

						data: {accion:'guardar_especialidad',nombre:$("#especialidad").val()} ,
							  success: function(){
							 $("#div_auxiliar" ).load( "ver/especialidad.php");
							 $("#div_final").hide("slide",400);
							   }
							  
							});	
				  
				  }
			
			
			
			});
				 
		 //----¡
	 
	 } );
	 });  	 
	  

    
	
	
	
//  ARCHIVO 
//--------------------------------------------------------------------------??????????????


	 //Agregar Paciente
	 $("#div_general").on('click' ,'#mn_nuevo_paciente',function(event){
	    event.preventDefault();
		$("#div_final").hide("slide",200);
		//-----!!
		$("#div_auxiliar").hide("blind",200,function(){
	     $("#div_auxiliar" ).load( "agregar/paciente.php",function(){
		
		  $("#div_auxiliar").show("blind",400);
		  
		  	 //-----
				$("#fr_paciente").validate({
						
							  rules:{
							  
								   'nombre': 'required',
								   'apellido': 'required',
								   'cedula': 'required',
								   'telefono': 'required',
								   
								   
								   
							  
							  },
							  
							  messages:{
							  
								   'nombre': 'Obligatorio',
								   'apellido': 'Obligatorio',
								   'cedula': 'Obligatorio',
								   'telefono': 'Obligatorio',
								   
								  
							  
							  },
							   
							  debug:true,
							  
							  submitHandler:function(form){
							  
							  
							  
											$.ajax({   
										type: 'POST',   
										url: 'acciones.php',   
			
									data: {accion:'guardar_paciente',nombre:$("#nombre").val(),apellido:$("#apellido").val(),cedula:$("#cedula").val(),telefono:$("#telefono").val(),seguro:$("#seguro").val(),direccion:$("#direccion").val()} ,
										  success: function(){
										
										 $("#div_auxiliar").hide("blind",200);
										 alert ("Paciente ya se encentra Registrado.");
										   }
										  
										});	
							  
							  }
						
						
						
						});
				 
		 //----¡		  
		  
		} );
		 
	});	 
	//-----!!	 
	 
	 });  	 
	 





	 //Agregar Cita
	 $("#div_general").on('click' ,'#mn_nueva_cita',function(event){
	    event.preventDefault();

		//-----!!
		$("#div_final").hide("slide",200);
		$("#div_auxiliar").hide("blind",200,function(){

	     $("#div_auxiliar" ).load( "agregar/cita.php",function(){
		
		  $("#div_auxiliar").toggle("blind",400);



     //+++++++++++++++
	    //buscar por cedula
	    $("#cedula").autocomplete({
        source: "acciones.php?accion=buscar_cedula",
        minLength: 2,
        select: function(event, ui) {
            
			 $("#nombre").val(ui.item.nombre);
			 $("#apellido").val(ui.item.apellido);
			 $("#telefono").val(ui.item.telefono);
			 $("#direccion").val(ui.item.direccion);
			 $("#seguro").val(ui.item.seguro);
			 $("#div_final" ).load( "agregar/cita_seleccionar_fecha.php?cedula="+ui.item.cedula,function(){
																				  
													          //SELECCIONAR FECHA DE CITA
															  $("#fecha_cita").datepicker({
																changeYear: true,
																changeMonth: true,
																yearRange: "-0:+2",
																minDate: 'today',
																dateFormat:"dd/mm/yy"
																});								  
																										
															$("#div_final").toggle("slide",1000);		
													
													});
			 //$("#id_paciente").val(ui.item.id_paciente);
            
        },
 
        html: true, // optional (jquery.ui.autocomplete.html.js required)
 
      // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
			$("#div_final").hide("slide",200);
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
	 //+++++++++++++++
	 
     //+++++++++++++++
	    //buscar por nombre
	    $("#nombre").autocomplete({
        source: "acciones.php?accion=buscar_nombre",
        minLength: 2,
        select: function(event, ui) {
            
			 $("#cedula").val(ui.item.cedula);
			 $("#apellido").val(ui.item.apellido);
			 $("#telefono").val(ui.item.telefono);
			 $("#direccion").val(ui.item.direccion);
			 $("#seguro").val(ui.item.seguro);
			 $("#div_final" ).load( "agregar/cita_seleccionar_fecha.php?cedula="+ui.item.cedula,function(){
																				  
													          //SELECCIONAR FECHA DE CITA
															  $("#fecha_cita").datepicker({
																changeYear: true,
																changeMonth: true,
																yearRange: "-0:+2",
																minDate: 'today',
																dateFormat:"dd/mm/yy"
																});								  
																										
															$("#div_final").toggle("slide",1000);		
													
													});			 
			 //$("#id_paciente").val(ui.item.id_paciente);
            
        },
 
        html: true, // optional (jquery.ui.autocomplete.html.js required)
 
      // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
	 //+++++++++++++++
	      //+++++++++++++++
	    //buscar por apellido
	    $("#apellido").autocomplete({
        source: "acciones.php?accion=buscar_apellido",
        minLength: 2,
        select: function(event, ui) {
            
			 $("#apellido").val(ui.item.apellido);
			 $("#cedula").val(ui.item.cedula);
			 $("#telefono").val(ui.item.telefono);
			 $("#direccion").val(ui.item.direccion);
			 $("#seguro").val(ui.item.seguro);
			 $("#div_final" ).load( "agregar/cita_seleccionar_fecha.php?cedula="+ui.item.cedula,function(){
																				  
													          //SELECCIONAR FECHA DE CITA
															  $("#fecha_cita").datepicker({
																changeYear: true,
																changeMonth: true,
																yearRange: "-0:+2",
																minDate: 'today',
																dateFormat:"dd/mm/yy"
																});								  
																										
															$("#div_final").toggle("slide",1000);		
													
													});			 
			 //$("#id_paciente").val(ui.item.id_paciente);
            
        },
 
        html: true, // optional (jquery.ui.autocomplete.html.js required)
 
      // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
	 //+++++++++++++++
	  
		  
		} );

	});	 
	//-----!!	
	 }); 












//-------------------------------------------------------------------???????????????????????????


















	
	
	
	
	
	
	
	//boton  cerrar ventana auxiliar todos los casos 
	 $("#div_auxiliar").on('click' ,'#cerrar_auxiliar',function(event){
	    event.preventDefault();
		$("#div_auxiliar").hide("blind",300);
		$("#div_final").hide("slide",200);
	
	 
	 }); 
	 
	 
	 
	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++





//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

 
  //ACCIONES GUARDAR
  


     //guardar seguro  
	/* 
	 $("#div_final").on('click' ,'#btn_seguro',function(event){
	  
	  
	  alert("bloqueado");
	 
	 });*/

	



//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!








	
	
	//PANTALLA CREAR CITA
	//-----------------------------------------------------------------------------------------
	
	     $("#especialidad").change(function(){
		 
		
		   
		   $("#cbo_medico").load("acciones.php?accion=combo_medico_especialidad&id_especialidad="+$("#especialidad").val());
		 
		 });
	
	//-----------------------------------------------------------------------------------------
	
	
	
	
	
	
	
	
	      //SELECCIONAR FECHA DE CITA
		  $("#fecha_cita").datepicker({
			changeYear: true,
			changeMonth: true,
			yearRange: "-0:+2",
			minDate: 'today',
			dateFormat:"dd/mm/yy"
			});	
		  
		  
		  
		  
		  
		  //TOOL TIP muestra hint grandes
		    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });




//REPORTES

//RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP
//OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
//RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS


	 //Agregar Cita
	 $("#div_general").on('click' ,'#mn_calendario',function(event){
	    event.preventDefault();
	
	
	     
	       $("#div_auxiliar").load("reporte/calendario.php",function(){
																	 
								$("#div_auxiliar").show("blind",300);
								
			
								//CALENDARIO
								//++++++++++++++++++++++++++++++++++++++++++++++
									
									$('#calendario').fullCalendar({
										header: {
											left: 'prev,next today',
											center: 'title',
											right: 'agendaDay,agendaWeek,month'
										},
										
										prev:function(){
											  
											  alert("atras");
											
											},
										
										editable: true,
											
											 minTime: 7,
											 maxTime: 20,
											slotMinutes:30,
											allDaySlot:false,
										events: "acciones.php?accion=reporte_calendario",
										
													eventDrop: function(event, _dia,_minuto) {
													
													 $.ajax({   
															   type: 'POST',   
															   url: 'acciones.php',   
															   data: {accion:"cita_actualizar" ,dia:_dia, minuto:_minuto, id_cita:event.id}
															});
											
										},  
										
										eventClick: function(calEvent, jsEvent, view) {
									
										 window.location = "http://www.domain.com?start=" + calEvent.start;
							
										},
										
										loading: function(bool) {
											if (bool)
											{ // $('#loading').show();
											  $("#div_auxiliar").addClass("alpha"); 
											
											}
											else{ //$('#loading').hide();
											
											   $("#div_auxiliar").removeClass("alpha"); 
											}
											
											
										}
									});	
									
									$('.fc-button-prev span').click(function(){

   alert("hola");

});
									
						});			
								


	});	




//+++++++++++++++++++++++++++++++++++++++++++++++++++++++


//RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP
//OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
//RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS

});
