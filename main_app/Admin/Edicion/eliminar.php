<?php 
require '../functions.php';
require '../../conexionbs.php';

if (isset($_GET['id'])) {
	$dbho= new conexionbs();
	$id=$_GET['id'];

	$query="DELETE FROM `clientes` WHERE documento=".$id;

	$dbho->query($query);

	if ($dbho->affected_rows <0 ) {
		header("location: consult.php?error=Hubo un problema");
	}
	else {
        header("location: consult.php");
	}
}
 ?>
