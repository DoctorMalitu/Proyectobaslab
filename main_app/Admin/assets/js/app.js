$(document).ready(function($) {
	
	
	// Variables declarations
	var $wrapper = $('.main-wrapper');
	var $pageWrapper = $('.page-wrapper');
	var $slimScrolls = $('.slimscroll');
	var $sidebarOverlay = $('.sidebar-overlay');
	
	// Sidebar
	var Sidemenu = function() {
		this.$menuItem = $('#sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('#sidebar-menu a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}
	// Sidebar Initiate
	init();
	
	// Sidebar overlay
	function sidebar_overlay($target) {
		if($target.length) {
			$target.toggleClass('opened');
			$sidebarOverlay.toggleClass('opened');
			$('html').toggleClass('menu-opened');
			$sidebarOverlay.attr('data-reff', '#' + $target[0].id);
		}
	}
	
	// Mobile menu sidebar overlay
	$(document).on('click', '#mobile_btn', function() {
		var $target = $($(this).attr('href'));
		sidebar_overlay($target);
		$wrapper.toggleClass('slide-nav');
		$('#chat_sidebar').removeClass('opened');
		return false;
	});
	
	
	
	// Sidebar overlay reset
	$sidebarOverlay.on('click', function() {
		var $target = $($(this).attr('data-reff'));
		if($target.length) {
			$target.removeClass('opened');
			$('html').removeClass('menu-opened');
			$(this).removeClass('opened');
			$wrapper.removeClass('slide-nav');
		}
		return false;
	});
	
	// Select 2
	if($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}
	
	// Floating Label
	if($('.floating').length > 0) {
		$('.floating').on('focus blur', function(e) {
			$(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
		}).trigger('blur');
	}
	
	// Right Sidebar Scroll
	if($('#msg_list').length > 0) {
		$('#msg_list').slimscroll({
			height: '100%',
			color: '#878787',
			disableFadeOut: true,
			borderRadius: 0,
			size: '4px',
			alwaysVisible: false,
			touchScrollStep: 100
		});
		var msgHeight = $(window).height() - 124;
		$('#msg_list').height(msgHeight);
		$('.msg-sidebar .slimScrollDiv').height(msgHeight);
		$(window).resize(function() {
			var msgrHeight = $(window).height() - 124;
			$('#msg_list').height(msgrHeight);
			$('.msg-sidebar .slimScrollDiv').height(msgrHeight);
		});
	}
	
	// Left Sidebar Scroll
	if($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function() {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}
	
	// Page wrapper height
	var pHeight = $(window).height();
	$pageWrapper.css('min-height', pHeight);
	$(window).resize(function() {
		var prHeight = $(window).height();
		$pageWrapper.css('min-height', prHeight);
	});
	
	// Datetimepicker
	if($('.datetimepicker').length > 0) {
		$('.datetimepicker').datetimepicker({
			format: 'DD/MM/YYYY'
		});
	}

	// Datatable
	if($('.datatable').length > 0) {
		const content = `
			<td class='text-right'>
				<div class='dropdown dropdown-action'>
					<a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
						<i class='fa fa-ellipsis-v'></i>
					</a>
					<div class='dropdown-menu dropdown-menu-right'>
						<a id='edit-button' class='dropdown-item'>
							<i class='fa fa-pencil m-r-5'></i>Editar
						</a>
						<a id='delete-button' class='dropdown-item'>
							<i class='fa fa-trash-o m-r-5'></i> Eliminar
						</a>
						<a id='addresul-button' class='dropdown-item'>
						<i class="fas fa-poll"></i> Agregar Resultados
						</a>
						<a id='listarchi-button' class='dropdown-item'>
						<i class="fas fa-poll"></i> Archivos
						</a>

					</div>
				</div>
			</td>`;

		$('.datatable').DataTable({
			"language": {
				"zeroRecords": "No se encuentra el usuario..."
			  },
			"ajax":{
				"method":"POST",
				"url":"listar.php",
				"dataSrc":"row"
			},
			"columns":[
				{"row":"identificacion"},
				{"row":"documento"},
				{"row":"nombre"},
				{"row":"apellido"},
				{"row":"fecha_naci"},
				{"row":"genero"},
				{"row":"edad"},
				{"row":"correo"},
				{"row":"personal"},
				{"row":"empresas"},
				{"row":"fecha"},
				{"defaultContent": content}
				
			]
		});

		$('.datatable').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'editar.php?id=' + $(this).closest('tr').find('td').eq(1).html();
				$(this).parent().find('#edit-button').attr('href', href);
			});
		});
		$('.datatable').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'eliminar.php?id=' + $(this).closest('tr').find('td').eq(1).html();
				$(this).parent().find('#delete-button').attr('href', href);
			});
		});

		$('.datatable').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'subir.php?id=' + $(this).closest('tr').find('td').eq(1).html();
				$(this).parent().find('#addresul-button').attr('href', href);
			});
		});

		$('.datatable').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'verarchivos.php?ids=' + $(this).closest('tr').find('td').eq(1).html();	
				$(this).parent().find('#listarchi-button').attr('href', href);
			});
		});
	}


	// Datatable

	if($('.datatable2').length > 0) {		
		const content = `
			<td class='text-right'>
				<div class='dropdown dropdown-action'>
					<a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
						<i class='fa fa-ellipsis-v'></i>
					</a>
					<div class='dropdown-menu dropdown-menu-right'>
						<a id='edit-button' class='dropdown-item'>
							<i class='fa fa-pencil m-r-5'></i>Editar
						</a>
						<a id='delete-button' class='dropdown-item'>
							<i class='fa fa-trash-o m-r-5'></i> Eliminar
						</a>
						<a id='enviararchi-button' class='dropdown-item'>
						<i class="fas fa-poll"></i> Enviar correo
						</a>

					</div>
				</div>
			</td>`;
			
		$('.datatable2').DataTable({
			"language": {
				"zeroRecords": "No se encuentra el usuario..."
			  },
			"ajax":{
				"method":"GET",
				"cache": "true",
				"responsive": "true",
				"url":"listararchivos.php",
				data: "",
				},
			"columns":[
				{"data":"id"},
				{"data":"documento_cliente"},
				{"data":"ruta"},
				{"defaultContent": content}
				
			]
			
		});

		$('.datatable2').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'editararchi.php?id=' + $(this).closest('tr').find('td').eq(0).html();
				$(this).parent().find('#edit-button').attr('href', href);
			});
		});

		$('.datatable2').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'eliminararchi.php?id=' + $(this).closest('tr').find('td').eq(0).html();
				$(this).parent().find('#delete-button').attr('href', href);
			});
		});

		$('.datatable2').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'enviararchi.php?id=' + $(this).closest('tr').find('td').eq(0).html();
				$(this).parent().find('#enviararchi-button').attr('href', href);
			});
		});
		
	}



	// Datatable
	if($('.datatablexam').length > 0) {
		const content = `
			<td class='text-right'>
				<div class='dropdown dropdown-action'>
					<a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
						<i class='fa fa-ellipsis-v'></i>
					</a>
					<div class='dropdown-menu dropdown-menu-right'>
						<a id='edit-button' class='dropdown-item'>
							<i class='fa fa-pencil m-r-5'></i>Editar</a>
						<a class='dropdown-item' href='../../Edicion/editarexamen.php' data-toggle='modal' data-target='#delete_patient'>
							<i class='fa fa-trash-o m-r-5'></i> Eliminar
						</a>
					</div>
				</div>
			</td>`;

		$('.datatablexam').DataTable({
			"ajax":{
				"method":"POST",
				"url":"listarexam.php",
				"dataSrc":"row"
			},
			"columns":[
				{"row":"codigo"},
				{"row":"nombre"},
				{"row":"precio"},
				{"defaultContent": content}
			]
		});

		$('.datatablexam').on( 'draw.dt', function () {
			$('.dropdown-toggle').on('click', function () {
				const href = 'editarexamen.php?id=' + $(this).closest('tr').find('td').eq(0).html();
				$(this).parent().find('#edit-button').attr('href', href);
			});
		});
	}
	
	// Bootstrap Tooltip
	if($('[data-toggle="tooltip"]').length > 0) {
		$('[data-toggle="tooltip"]').tooltip();
	}
	//Custom Bootstrap Input File
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	  });
	 
	
	// Registro Ajax
	$('#registrarAjax').submit(function(a){
		var parametros = new FormData($('#registrarAjax')[0]);
		a.preventDefault();
		$.ajax({
			type: "POST",
            url: "../crud.php",
            data: parametros,
			contentType: false,
			processData: false
		});
		$('#registrarAjax').trigger('reset');
		$('.select').trigger('change');
	});

		// Enviar email normal Ajax
	$('#enviarcorreoorapido').submit(function(e){
		var parametros = new FormData($('#enviarcorreoorapido')[0]);
		e.preventDefault();
		$.ajax({
			type:"POST",
			url: "enviarcorreoo.php",
			data:parametros,
			contentType: false,
			processData: false
		});
	});
	
	// $('#subir').click(function() {
	// 	$('.selected').val('');
	//   });

	//SUBIR ARCHIVO AJAX
	$('#subir_archivos').submit(function(e){	
		var parametros = new FormData($('#subir_archivos')[0]);
		e.preventDefault();
		$.ajax({
			type: 'POST',
            url: "subirarchivos.php",
			data: parametros,
			contentType: false,
			processData: false,
			success: function(data)
            {  
                    location.href = 'http://localhost/Baslabgit2/main_app/Admin/Edicion/consult.php';           
           }
		});	
		// $('.select').trigger('change');
	});

	$('#editar_clientes').submit(function(e){	
		e.preventDefault();
		$.ajax({
			type: 'POST',
            url: "editarcrud.php",
			data: $(this).serialize(),
			success: function(data)
            {
               
                    location.href = 'http://localhost/Baslabgit2/main_app/Admin/Edicion/consult.php';           
           }
		});	
		// $('.select').trigger('change');
	});

});
