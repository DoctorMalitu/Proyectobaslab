<?php
session_start();
if (isset($_SESSION['usuario'])) {
	if ($_SESSION['usuario']['Tipo_usuario'] != "Empresa") {
	  header('Location: ../Admin/');
	}
  }else {
	header("Location: ../../");
	exit();
  }

// Tiempo de sesion
  if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 1200;//20min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();              
            //Redirigimos pagina.
            $archivoActual = $_SERVER['PHP_SELF'];
            header("refresh:1;url= http://localhost/Baslabgit2");

            exit();
        } else {  // si no ha caducado la sesion, actualizamos
            $_SESSION['tiempo'] = time();
        }


} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}



?>