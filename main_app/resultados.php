<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
<title>Laboratorio Clinico Dolly Roncancio</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Clinical Lab Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" type="text/css" href="../iconos/fonts1.css">
<!-- js -->
<!-- //js -->
<!--animate-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">

<!--//end-animate-->

<!-- Estilos de esta pagina resultados -->
<link rel="stylesheet" href="css/estilosresul.css" type="text/css">
<!-- Aca terminan los estilos -->

<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->

<link rel="stylesheet" type="text/css" href="Admin/assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="Admin/assets/css/dataTables.bootstrap4.min.css">
<!-- <script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> -->
<!-- start-smoth-scrolling -->

</head>
<body>
<!-- header -->
<div class="header_w3l" data-spy="affix">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<h1><a  href="index.html">Dolly<span> Roncancio</span><img class="imagenlogo" src="../images/icono7.png" alt="Solvetic"></a></h1>
			</div>
				<!-- top-nav -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../index.html" class="active"><span class="iconmenu icon-home"></span> Inicio</a></li>
					<li><a href="../about.html"><span class="iconmenu icon-book"></span> Nosotros</a></li>
					<!-- <li><a href="../treatments.html"><span class="iconmenu icon-lab"></span> Servicios</a></li> -->
					<li><a href="resultados.php"><span class="iconmenu icon-download"></span> Descargar Resultados</a></li>
					<li><a href="../contact.html"><span class="iconmenu icon-location2"></span> Contacto</a></li>
					<li><a href="../loogin.php"><span class="iconmenu icon-user-tie"></span> Usuario</a></li>
				</ul>	
				<div class="clearfix"> </div>	
			</div>
		</nav>
	</div>
</div>
<!-- header -->
<!-- banner -->
<div style="margin-bottom:70px;" class="banner_w3ls page_head">
	
</div>
<!-- //banner -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="card-title">REGISTRO DE USUARIOS</h4>
                    <form id="resultindex" action="" method="get">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Documento:</label>
                                    <input type="text" id="documentoresult" name="documentoresult" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                    <div class="form-group">
                                            <label>Fecha nacimiento:</label>
                                            <input type="date" id="fecha_naci" name="fecha_naci" class="form-control" required>
                                    </div>
                            </div>
                            <div class="col-md-2">
                            <div class="text-center" style="margin-top: 20px; margin-bottom: 20px;">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" table-responsive">
                                <table  class="datatableresul table table-bordered table-striped custom-table  mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th> 
                                            <th>Documento</th> 
                                            <th>Nombre</th> 
                                            <th>Apellido</th>
                                            <th>Fecha nacimiento</th>
                                            <th>Entidad</th>  
                                            <th>Empresa</th> 
                                            <th>Archivos</th>                                             
                                            <th>Opciones</th>   
                                        </tr>
                                    </thead>   
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    
</div>
    <script src="Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="Admin/assets/js/popper.min.js"></script>
    <script src="Admin/assets/js/bootstrap.min.js"></script>
    <script src="Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="Admin/assets/js/select2.min.js"></script>
    <script src="Admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="Admin/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="Admin/assets/js/moment.min.js"></script>
    <script src="Admin/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="Admin/assets/js/app.js"></script>
    <script src="Admin/assets/js/consult.js"></script>
    <script src="https://kit.fontawesome.com/e4cc53287d.js"></script>
    <script type="text/javascript" src="js/mainresul.js"></script>
   
    
</body>
</html>