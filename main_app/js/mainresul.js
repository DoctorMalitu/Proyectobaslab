$(document).ready(function($) {


    $('#resultindex').submit(function(e){
        
		e.preventDefault();
		$.ajax({
			type: 'POST',
            url: "ediciones/listarresult.php",
			data: $(this).serialize(),
            dataType:'json',
            success:function(data){
                
                // $("#chao").append();
                document.getElementById("chao").style.display = "block";
                const dataTableContenido = data.row;
                $('.datatableresul').on('draw.dt', function () {
                    $('.dropdown-toggle').on('click', function () {
                        const href = 'ediciones/descargararchi.php?id='+ $(this).closest('tr').find('td').eq(0).html();
                        $(this).parent().find('#des-button').attr('href', href);
                    });
                });
                if($('.datatableresul').length > 0) {
                    const content = `<td class='text-right'>
                            <div class='dropdown dropdown-action'>
                                <a href='#' class='action-icon dropdown-toggle  m-l-5' data-toggle='dropdown' aria-expanded='false'>
                                + <i class="fas fa-mouse-pointer"></i>
                                </a>
                                    <div class='dropdown-menu dropdown-menu-right'>
                                        <a id='des-button' class='dropdown-item'>
                                        <i class='fas fa-file-download m-r-5'></i>Descargar
                                        </a>
                                
                                    </div>  
                            </div>
                        </td>`;
                    $('.datatableresul').DataTable({
                        "language": {
                            "zeroRecords": "No se encuentra el usuario...",
                            "sProcessing":     "Procesando...",
                            "sSearch":"Buscar",
                            "sLengthMenu":     "Mostrar MENU registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sLoadingRecords": "Cargando...",
                            "sInfo":           "Mostrando",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                          },
                          data: dataTableContenido,
                        "columns":[
                            { dataTableContenido: 'id'},	
                            { dataTableContenido: 'documento_cliente'},	
                            { dataTableContenido: 'nombre'},
                            { dataTableContenido: 'apellido'},
                            { dataTableContenido: 'personal'},
                            { dataTableContenido: 'empresas'},
                            { dataTableContenido: 'ruta'},
                            { dataTableContenido: 'fecha_naci'},
                            {"defaultContent": content}
    
                        ]
                    });
            
                }  
                
             }, 
        error:function(data) {
            
            document.getElementById("chao").style.display = "none";
            $('#documentoresult').trigger('reset');
            var alert= '<div id="myalert" class="alert alert-danger" role="alert" style="display: block">'+'<strong>El usuario no existe</strong> '+'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+'<span aria-hidden="true">&times;</span>'+'</button>'+'</div>';
		
				
			
				$('#alerta').append(alert);
					setTimeout(function(){
						$('#alerta').addClass('on');
					},200);
				

				$('.close').click(function() {
					$('$myalert').hide('fade');
				});
          }     
            // $('.select').trigger('change');
        });
        }) 
        
   


});