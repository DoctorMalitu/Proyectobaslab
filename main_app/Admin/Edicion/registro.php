<?php
require '../functions.php';
require '../../conexionbs.php';
$dbho = new conexionbs();
?>
<!DOCTYPE html>
<html lang="en">

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
				<a href="../index.php" class="logo">
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
                        <li class="active">
                            <a href="registro.php"><i class="fas fa-user-edit"></i> <span>Registro Pacientes</span></a>
                        </li>
                        <li>
                            <a href="consult.php"><i class="fas fa-users"></i> <span>Pacientes</span></a>
                        </li>   
                        <li>
                            <a href="miniformuproducto.php"><i class="fas fa-notes-medical"></i> <span>Registro Examenes</span></a>
                        </li>
                        <li>
                            <a href="consultproducto.php"><i class="fas fa-microscope"></i> <span>Examenes</span></a>
                        </li> 
                        <li>
                            <a href="enviarcorreo.php"><i class="fa fa-paper-plane"></i> <span>Enviar Resultados</span></a>
                        </li> 
                        <li>
                            <a href="registrousuarios.php"><i class="fas fa-user-shield"></i> <span>Registrar Usuarios</span></a>
                        </li>  
                        <li>
                            <a href="usuarios.php"><i class="fas fa-users-cog"></i> <span>Usuarios</span></a>
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
                            <h4 class="card-title">REGISTRO DE USUARIOS</h4>
                            <form id="registrarAjax" action="" method="POST" >
                                <h4 class="card-title">INFORMACION PERSONAL</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de documento</label>
                                            <select name="identificacion" class="select" required>
                                                 <option value="" disabled selected value>Seleccione</option>
                                                <option value="CC">CC</option>
                                                <option value="TI">TI</option>
                                                <option value="TT">TT</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" id="Nombre" name="nombre" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha nacimiento</label>
                                            <input type="date" id="direc" name="fecha_naci" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Edad</label>
                                            <input type="text" id="edad" name="edad" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo de paciente</label>
                                            <select name="personal" class="select">
                                                 <option value="" disabled selected value>Seleccione</option>
                                                <option value="Empresa">Empresa</option>
                                                <option value="Particular">Particular</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documento</label>
                                            <input type="text" id="CC"  name="documento" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input type="text" id="Apellido" name="apellido" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Genero</label>
                                            <select name="genero" class="select">
                                                 <option value="" disabled selected value>Seleccione</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input type="text" name="correo" class="form-control" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Tipo de empresa</label>
                                            <select name="empresas" class="select">
                                                 <option value="" disabled selected value>Seleccione</option>
                                                 <?php $query1="SELECT * FROM `usuarios` WHERE Tipo_usuario='Empresa' ";
                                                 $resultado = $dbho -> query($query1);
                                                 while($emp=mysqli_fetch_array($resultado))
                                                {?>
                                                <option value="<?php echo $emp['Nombre'];?>" <?php if($emp['id']==$emp['Nombre']) echo  "selected" ?> ><?php echo $emp['Nombre'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <p>Subir archivo:</p>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="fichero" name="fichero[]" size="250" maxlength="250" accept="application/pdf" multiple require>
                                            <label class="custom-file-label" for="customFile">Elija el archivo</label>
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


    <script>
    
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="../assets/js/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/e4cc53287d.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/app.js"></script>
</body>


<!-- form-vertical23:59-->
</html>