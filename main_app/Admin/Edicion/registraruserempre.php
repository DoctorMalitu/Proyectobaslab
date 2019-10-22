<?php
require '../functions.php';
require '../../conexionbs.php';

$dbho = new conexionbs();

if (isset($_POST['Nombre'])){

	$Nombre =mysqli_real_escape_string($dbho, htmlentities( $_POST['Nombre']));
	$Usuario =mysqli_real_escape_string($dbho, htmlentities( $_POST['Usuario']));
    $Pasword= mysqli_real_escape_string($dbho, htmlentities($_POST['Pasword']));
    $Paswordhas=hash('sha512', $Pasword);
	$Tipo_usuario= mysqli_real_escape_string($dbho, htmlentities($_POST['Tipo_usuario']));

	$query="INSERT INTO `usuarios`(`Nombre`, `Usuario`, `Pasword`, `Tipo_usuario`, `fecha_regis`) VALUES ('$Nombre','$Usuario','$Paswordhas','$Tipo_usuario','".date('Y-m-d')."')";
	$dbho -> query($query);
	print("Datos guardados");
    echo "<br>";
}

?>