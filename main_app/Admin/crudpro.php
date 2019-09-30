<?php

require '../conexionbs.php';
require 'functions.php';

$dbho = new conexionbs();


if (isset($_POST['Enviar'])) {
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];

	$query="INSERT INTO `producto`(`codigo`, `nombre`, `precio`) VALUES ('$codigo','$nombre','$precio')";

$dbho -> query($query);
 } 
 
 if (isset($_POST['Editar'])) {
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$id=$_POST['id'];
	
	
	$query="UPDATE `producto` SET  `codigo`='$codigo',`nombre`='$nombre',`precio`='$precio' WHERE codigo=$id";


$dbho -> query($query);
 } 
?>
<!DOCTYPE html>
<html>
     <meta http-equiv="Refresh" content="0;url='http://localhost/Baslabgit/main_app/Admin/Edicion/consultproducto.php'">
<head>
	<title></title>
</head>
<body>

</body>
</html>