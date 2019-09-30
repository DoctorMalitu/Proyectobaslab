<?php

require '../conexionbs.php';
require 'functions.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>BASLAB</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Baslab</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                
              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>Admin <?php echo $_SESSION['usuario']['Nombre']; ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../salir.php">Cerrar Sesion</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../salir.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menú</li>
                        <li class="active">
                            <a href="index.php"><i class="fa fa-hospital-o"></i> <span>Inicio</span></a>
                        </li>
						   
                        <li>
                            <a href="Edicion/registro.php"><i class="fa fa-edit"></i> <span>Registro</span></a>
                        </li>
                        <li>
                            <a href="Edicion/consult.php"><i class="fa fa-user"></i> <span>Pacientes</span></a>
                        </li>
						<li>
                            <a href="Edicion/miniformuproducto.php"><i class="fa fa-medkit"></i> <span>Registro examenes</span></a>
                        </li>
                        <li>
                            <a href="Edicion/consultproducto.php"><i class="fa fa-plus-square"></i> <span>Consultar Examenes</span></a>
                        </li>
                        <li>
                            <a href="Edicion/enviarcorreo.php"><i class="fa fa-paper-plane"></i> <span>Reenvio resultados</span></a>
                        </li>   
                        <li>
                            <a href="Edicion/verarchivos.php"><i class="fa fa-paper-plane"></i> <span>Ver resultados</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3>Usuarios Registrados &nbsp; [<?php echo $cont3=Todosclientes(); ?>]</h3>
								<span class="widget-title1">Registrados <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>Usuarios Atendidos &nbsp; [<?php echo $cont2=ContadorEs();?>]</h3>
                                <span class="widget-title2">Atendidos <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>Usuarios sin Atender &nbsp; [<?php echo $cont3=Clientesinatender();?>]</h3>
                                <span class="widget-title3">Sin Atender <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-building" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>Empresas Registradas &nbsp; [<?php echo $cont4=EmpresasRegistradas(); ?>]</h3>
                                <span class="widget-title4">Empresas <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patient Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patients In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Pendientes por agregar resultados</h4> <a href="Edicion/consult.php" class="btn btn-primary float-right">Ver Todo</a>
							</div>
							<div class="card-body p-0 ">
								<div class="table-responsive" style="overflow-y: auto; height: 316px;">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Usuario</th>
												<th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Entidad</th>                                       
												<th>Fecha</th>    
											</tr>
                                        </thead>
                                        
                                        <?php
                                         $dbho = new conexionbs();
                                         $query="SELECT `documento`, `nombre`, `apellido`, `personal`, `genero`, `fecha` FROM `clientes` ORDER BY fecha DESC ";
                                        $res = $dbho -> query($query);
                                        $tablon ='';
                                        while ($row = mysqli_fetch_array($res)) {
                                            $tablon .="<tbody>";   
                                            $tablon .="<tr>";
                                            $tablon .="<td style='min-width: 200px;'><a class='avatar' href='Edicion/consult.php'>P</a><h2><a href='Edicion/consult.php'>$row[nombre]<span>Identificación: $row[documento]</span></a></h2></td>";
                                            $tablon .="<td><h5 class='time-title p-0'>Nombre</h5><p>$row[nombre]</p></td>";
                                            $tablon .="<td><h5 class='time-title p-0'>Apellido</h5><p>$row[apellido]</p></td>";
                                            $tablon .="<td><h5 class='time-title p-0'>Entidad</h5><p>$row[personal]</p></td>";
                                            $tablon .="<td><h5 class='time-title p-0'>Fecha</h5><p>$row[fecha]</p></td>";
                                            $tablon .="<td><h5 class='time-title p-0'>Estado</h5><p>$row[genero]</p></td>";
                                            // $tablon .="<td class='text-right'><a href='Edicion/consult.php' class='btn btn-outline-primary take-btn'>VER</a></td>";
                                            $tablon .="<tr>";
                                             $tablon .="</tbody>";   
                                            }
                                            echo $tablon;
                                        ?>
                                    </table>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Usuarios</h4>
							</div>
                            <div class="card-body">
                                <div class="table-responsive"> 
                                <?php
                                            $query1="SELECT  `Nombre`, `Usuario`, `Tipo_usuario` FROM `usuarios`";
                                            $res1 = $dbho -> query($query1);
                                            $tablon1 ='';
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                
                                                $tablon1 .="<ul class='contact-list'>";   
                                                $tablon1 .="<li class='liinter'>";   
                                                $tablon1 .="<div class='contact-cont'>";
                                                $tablon1 .="<div  class='float-left user-img m-r-10'>";
                                                $tablon1 .="<a href='profile.html'><img src='assets/img/user.jpg' alt='' class='w-40 rounded-circle'><span class='status online'></span></a>";
                                                $tablon1 .="</div>";
                                                $tablon1 .="<div class='contact-info'>";
                                                $tablon1 .="<span class='contact-name text-ellipsis'>Nombre: $row1[Nombre]<span class='contact-name text-right'>&nbsp; Rango: &nbsp; $row1[Tipo_usuario]</span></span>";
                                                $tablon1 .="<span class='contact-date'>Usuario: $row1[Usuario]</span>";
                                                $tablon1 .="</div>";
                                                $tablon1 .="</div>";
                                                $tablon1 .="</li>";   
                                                $tablon1 .="</ul>"; 
                                                }
                                                echo $tablon1;
                                        ?>
                                    
                                </div>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.html" class="text-muted">VER TODOS LOS USUARIOS</a>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Nuevos pacientes </h4>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
                                    <?php
                                            $query2="SELECT `nombre`, `personal`, `fecha` FROM `clientes` ORDER BY fecha DESC ";
                                            $res2 = $dbho -> query($query2);
                                            $tablon2 ='';
                                            while ($row2 = mysqli_fetch_array($res2)) {
                                                
                                                $tablon2 .="<tbody>";   
                                                $tablon2 .="<tr>"; 
                                                $tablon2 .="<td>"; 
                                                $tablon2 .="<img width='28' height='28' class='rounded-circle' src='assets/img/user.jpg' alt=''>"; 
                                                $tablon2 .="<h2>Nombre: $row2[nombre]</h2>";
                                                $tablon2 .="</td>";
                                                $tablon2 .="<td>"; 
                                                $tablon2 .="<h2>$row2[personal]</h2>";
                                                $tablon2 .="</td>";
                                                $tablon2 .="<td>"; 
                                                $tablon2 .="<h2>$row2[fecha]</h2>";
                                                $tablon2 .="</td>";
                                                $tablon2 .="</tr>";
                                                $tablon2 .="</tbody>"; 
                                                }
                                                echo $tablon2;
                                        ?>
										
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-4">
						<div class="hospital-barchart">
							<h4 class="card-title d-inline-block">Gestión Baslab</h4>
						</div>
						<div class="bar-chart">
							<!-- <div class="legend">
								<div class="item">
									<h4>Level1</h4>
								</div>
								
								<div class="item">
									<h4>Level2</h4>
								</div>
								<div class="item text-right">
									<h4>Level3</h4>
								</div>
								<div class="item text-right">
									<h4>Level4</h4>
								</div>
							</div> -->
							<div class="chart clearfix">
								<div class="item">
									<div class="bar">
										<span class="percent"> <?php echo $cont3=Todosclientes(); ?>%</span>
										<div class="item-progress" data-percent=" <?php echo $cont3=Todosclientes(); ?>">
											<span class="title">Registrados</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent"><?php echo $cont2=ContadorEs();?>%</span>
										<div class="item-progress" data-percent="<?php echo $cont2=ContadorEs();?>">
											<span class="title">Atendidos</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent"><?php echo $cont3=Clientesinatender(); ?>%</span>
										<div class="item-progress" data-percent="<?php echo $cont3=Clientesinatender(); ?>">
											<span class="title">Sin&nbsp;atender</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent"><?php echo $cont4=EmpresasRegistradas(); ?>%</span>
										<div class="item-progress" data-percent="<?php echo $cont4=EmpresasRegistradas(); ?>">
											<span class="title">Empresas&nbsp;Registradas</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">30%</span>									
										<div class="item-progress" data-percent="30">
											<span class="title">Discharge</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					 </div>
				</div>
            </div>
         
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e4cc53287d.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>



</html>