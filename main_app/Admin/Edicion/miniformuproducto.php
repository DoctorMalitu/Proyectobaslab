<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
// //Comprobamos si esta definida la sesión 'tiempo'.
// if(isset($_SESSION['tiempo']) ) {

//     //Tiempo en segundos para dar vida a la sesión.
//     $inactivo = 10;//20min en este caso.

//     //Calculamos tiempo de vida inactivo.
//     $vida_session = time() - $_SESSION['tiempo'];

//         //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
//         if($vida_session > $inactivo)
//         {
//             //Removemos sesión.
//             session_unset();
//             //Destruimos sesión.
//             session_destroy();              
//             //Redirigimos pagina.
//             $archivoActual = $_SERVER['PHP_SELF'];
//             header("refresh:1;url= http://localhost/Baslab04l07l2019/");

//             exit();
//         } else {  // si no ha caducado la sesion, actualizamos
//             $_SESSION['tiempo'] = time();
//         }


// } else {
//     //Activamos sesion tiempo.
//     $_SESSION['tiempo'] = time();
// }
?>
<!-- form-vertical23:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Baslab</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="../assets/img/logo.png" width="35" height="35" alt=""> <span>Baslab</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="../assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                            <span>Admin <?php echo $_SESSION['usuario']['Nombre']; ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../../salir.php">Cerrar Sesion</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../../salir.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menú</li>
                        <li>
                            <a href="../index.php"><i class="fa fa-hospital-o"></i> <span>Inicio</span></a>
                        </li>
                        <li>
                            <a href="registro.php"><i class="fa fa-edit"></i> <span>Registro</span></a>
                        </li>
                        <li>
                            <a href="consult.php"><i class="fa fa-user"></i> <span>Pacientes</span></a>
                        </li>
                        <li>
                            <a href="miniformuproducto.php"><i class="fa fa-medkit"></i> <span>Registro examenes</span></a>
                        </li>
                        <li>
                            <a href="consultproducto.php"><i class="fa fa-plus-square"></i> <span>Registro examenes</span></a>
                        </li>  
                        <li>
                            <a href="enviarcorreo.php"><i class="fa fa-paper-plane"></i> <span>Enviar Resultado</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">REGISTRO</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="card-title">REGISTRO DE EXAMENES NUEVOS PARA LA TABLA DE LA PAGINA</h4>
                            <form action="../crudpro.php" method="POST">
                                <h4 class="card-title">EXAMENES</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Código</label>
                                            <input type="text" id="codigo" name="codigo" class="form-control" pattern="[A-Za-z0-9_-]{1,15}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Nombre del examen</label>
                                                <input type="text" id="nombre" name="nombre" class="form-control" pattern="[A-Za-z0-9_-]{1,15}" required>
                                            </div>       
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Precio</label>
                                                <input type="number" id="precio" name="precio" class="form-control" pattern="[0-9_-]{1,15}" required>
                                        </div>       
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="https://kit.fontawesome.com/e4cc53287d.js"></script>
</body>


<!-- form-vertical23:59-->
</html>
