<?php
session_start();
if (isset($_SESSION['usuario'])) {
	if ($_SESSION['usuario']['Tipo_usuario'] != "Admin") {
	  header('Location: ../Usuarioo/');
	}
  }else {
	header("Location: ../../");
	exit();
  }
  // //Comprobamos si esta definida la sesión 'tiempo'.
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
            header("refresh:1;url= http://localhost/finalbaslab/");

            exit();
        } else {  // si no ha caducado la sesion, actualizamos
            $_SESSION['tiempo'] = time();
        }


} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}
function ContadorEs()
{
    $dbho = new conexionbs();
    $query="SELECT * FROM producto"; 
    $numero = $dbho -> query($query);
    $cont= mysqli_num_rows($numero);
    return $cont;
}
function Todosclientes()
{
    $dbho = new conexionbs();
    $query="SELECT * FROM clientes"; 
    $clientes = $dbho -> query($query);
    $cont= mysqli_num_rows($clientes);
    return $cont;
}
function Clientesinatender()
{
    $dbho = new conexionbs();
    $query="SELECT * FROM archivos"; 
    $clientesin = $dbho -> query($query);
    $cont= mysqli_num_rows($clientesin);
    return $cont;
}
function EmpresasRegistradas()
{
    $dbho = new conexionbs();
    $query="SELECT * FROM usuarios WHERE Tipo_usuario='Empresa'"; 
    $clientesin = $dbho -> query($query);
    $cont= mysqli_num_rows($clientesin);
    return $cont;
}
function RegisReciente()
{
    $dbho = new conexionbs();
    $query="SELECT * from clientes WHERE fecha = (SELECT MAX (fecha) FROM clientes)"; 
    $clientesin = $dbho -> query($query);
    $cont= mysqli_num_rows($clientesin);
    return $cont;
}
function PacientesParticulares()
{
    $dbho = new conexionbs();
    $query="SELECT * from clientes WHERE personal='Particular'"; 
    $clientesin = $dbho -> query($query);
    $cont= mysqli_num_rows($clientesin);
    return $cont;
}
function PacientesEmpresa()
{
    $dbho = new conexionbs();
    $query="SELECT * from clientes WHERE personal='Empresa'"; 
    $clientesin = $dbho -> query($query);
    $cont= mysqli_num_rows($clientesin);
    return $cont;
}
?>