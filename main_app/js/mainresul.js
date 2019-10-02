$(document).ready(function($) {

    if($('.datatableresul').length > 0) {	
		var URLactual = window.location.href;// obtiene la url
// alert(URLactual);
		var url = URLactual; var id = url.substring(url.lastIndexOf('?') + 1);; //Solo agarra el ids=111111 y se sapara de la url actual
		var urlatual="ediciones/listarresult.php?"+id; //se concatena la url pasada con el ids del link primario
		// alert(urlatual);
		const content = `
			<td class='text-right'>
				<div class='dropdown dropdown-action'>
					<a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
						<i class='fa fa-ellipsis-v'></i>
					</a>
					<div style="margin-right: 10px;" class='dropdown-menu dropdown-menu-right'>
						<a style="margin-right: 10px;" id='descargararchi-button' class='dropdown-item'>
						<i style="margin-left: 10px; margin-right: 10px;" class='fas fa-file-download m-r-5'></i>Descargar
						</a>
				
					</div>
				</div>
			</td>`;
			
		$('.datatableresul').DataTable({
			"language": {
				"zeroRecords": "No se encuentra el usuario...",
				"sProcessing":     "Procesando...",
                "sSearch":"Buscar",
                "semptyTable": "Aca podra buscar sus datos",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sLoadingRecords": "No se encontro ningun dato...",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
              },
              "destroy":true,
			"ajax":{
                "serverSide": true,
				"method":"POST",
				"cache": "true",
				"responsive": "true",
				"url":urlatual,
				"dataSrc":"row"
				},
			"columns":[
				{"row":"id"},	
				{"row":"documento_cliente"},	
				{"row":"nombre"},
                {"row":"apellido"},
                {"row":"fecha_naci"},
				{"row":"personal"},
				{"row":"empresas"},
				{"row":"ruta"},
				{"defaultContent": content}
				
			]
			
		});

		$('.datatableresul').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'ediciones/descargararchi.php?id=' + $(this).closest('tr').find('td').eq(0).html();
				$(this).parent().find('#descargararchi-button').attr('href', href);
			});
		});
	
	}
    // $('#resultindex').submit(function(e){	
	// 	e.preventDefault();
	// 	$.ajax({
	// 		type: 'GET',
    //         url: "ediciones/listarresult.php",
	// 		data: $(this).serialize(),
	// 		dataType:'json'
    //     }) 
    //     .done(function(data){
    //         if($('.datatableresul').length > 0) {
    //             const content = `
    //                 <td class='text-right'>
    //                     <div class='dropdown dropdown-action'>
    //                         <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
    //                             <i class='fa fa-ellipsis-v'></i>
    //                         </a>
    //                         <div class='dropdown-menu dropdown-menu-right'>
    //                             <a id='edit-button' class='dropdown-item'>
    //                                 <i class='fa fa-pencil m-r-5'></i>Editar</a>
    //                             <a class='dropdown-item' href='../../Edicion/editarexamen.php' data-toggle='modal' data-target='#delete_patient'>
    //                                 <i class='fa fa-trash-o m-r-5'></i> Eliminar
    //                             </a>
    //                         </div>
    //                     </div>
    //                 </td>`;
        
    //             $('.datatableresul').DataTable({
    //                 "language": {
    //                     "zeroRecords": "No se encuentra el usuario...",
    //                     "sProcessing":     "Procesando...",
    //                     "sSearch":"Buscar",
    //                     "sLengthMenu":     "Mostrar _MENU_ registros",
    //                     "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    //                     "sLoadingRecords": "Cargando...",
    //                     "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    //                     "oPaginate": {
    //                         "sFirst":    "Primero",
    //                         "sLast":     "Último",
    //                         "sNext":     "Siguiente",
    //                         "sPrevious": "Anterior"
    //                     },
    //                   },
    //                 "ajax":{
    //                     "method":"GET",
    //                     "dataType":'JSON',
    //                     "cache":true,
    //                     // "url":"ediciones/listarresult.php",
    //                     "dataSrc" :"row"
    //                 },
    //                 "columns":[
    //                     {"row":data["id'"]},	
    //                     {"row":data["documento_cliente"]},	
    //                     {"row":data["nombre"]},
    //                     {"row":data["apellido"]},
    //                     {"row":data["personal"]},
    //                     {"row":data["empresas"]},
    //                     {"row":data["ruta"]},
    //                     {"defaultContent": content}
    //                 ]
    //             });
        
    //             $('.datatableresul').on( 'draw.dt', function () {
    //                 $('.dropdown-toggle').on('click', function () {
    //                     const href = 'editarexamen.php?id=' + $(this).closest('tr').find('td').eq(0).html();
    //                     $(this).parent().find('#edit-button').attr('href', href);
    //                 });
    //             });
    //         }  
    // })   
    // .fail(function(data) {
    //     alert("Error... la identificacion o la fecha no coinciden con los datos almacenados" );
    //   })     
	// 	// $('.select').trigger('change');
	// });


});