<?php 
require '../functions.php';
require '../../conexionbs.php';

if (isset($_GET['id'])) {
	$dbho= new conexionbs();
	$id=$_GET['id'];

    $query="SELECT ruta FROM archivos WHERE id=".$id;
    $res=$dbho->query($query);
    $datos=mysqli_fetch_array($res);
    $nombrefinal= trim($datos['ruta']); //Eliminamos los espacios en blanco
    $nombref= preg_replace('[\s+]',"", $nombrefinal);//Sustituye una expresión regular
    $elimnararchi= unlink("archivos/".$nombref);
    $query1="DELETE FROM archivos WHERE id=".$id;
    $dbho->query($query1);
	if ($dbho->affected_rows <0 ) {
		header("location: consult.php?error=Hubo un problema");
	}
	else {
        header("location: consult.php");
	}
}
 ?>