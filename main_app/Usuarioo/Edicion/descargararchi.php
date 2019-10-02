<?php
require '../functionsus.php';
require '../../conexionbs.php';

if (isset($_GET['id'])) {
	$dbho= new conexionbs();
	$id=$_GET['id'];
	$query="SELECT ruta, tipo FROM archivos WHERE id=".$id;
	$res=$dbho->query($query);
    $datos=mysqli_fetch_array($res);
    $archivo=$datos['ruta'];
    $nombrefinal= trim($archivo); //Eliminamos los espacios en blanco
    $nombref= preg_replace('[\s+]',"", $nombrefinal);//Sustituye una expresión regular
    $filePatch='../../archivos/'.$nombref;
    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header('Content-disposition: attachment; filename='.$nombref); 
    header('Content-type: application/pdf');
    header('Content-Transfer-Encoding: binary');
    readfile('../../archivos/'.$nombref);
    
}
else {
    header("location:consult.php");
    print('error... algo paso');
}

?>