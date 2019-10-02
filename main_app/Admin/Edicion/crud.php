<?php
require '../functions.php';
require '../../conexionbs.php';

$dbho = new conexionbs();

if (isset($_POST['documento'])){

	$identificacion =mysqli_real_escape_string($dbho, htmlentities( $_POST['identificacion']));
	$documento =mysqli_real_escape_string($dbho, htmlentities( $_POST['documento']));
	$nombre = mysqli_real_escape_string($dbho, htmlentities($_POST['nombre']));
	$apellido = mysqli_real_escape_string($dbho, htmlentities($_POST['apellido']));
	$fecha_naci = mysqli_real_escape_string($dbho, htmlentities($_POST['fecha_naci']));
	$genero = mysqli_real_escape_string($dbho, htmlentities($_POST['genero']));
	$edad = mysqli_real_escape_string($dbho, htmlentities($_POST['edad']));
	$correo = mysqli_real_escape_string($dbho, htmlentities($_POST['correo']));
	$personal = mysqli_real_escape_string($dbho, htmlentities($_POST['personal']));
	$empresas = mysqli_real_escape_string($dbho, htmlentities($_POST['empresas']));

	$query="INSERT INTO `clientes`(`identificacion`, `documento`, `nombre`, `apellido`, `fecha_naci`, `genero`, `edad`, `correo`, `personal`, `empresas`, `fecha`) VALUES ('$identificacion','$documento','$nombre','$apellido','$fecha_naci','$genero','$edad','$correo','$personal','$empresas','".date('Y-m-d')."')";
	$dbho -> query($query);
	print("Datos guardados");
	echo "<br>";

		$contador=count($_FILES['fichero']['name']);
		
		
		  for($i=0;$i<=$contador;$i++){
			   
			  $nombrefinal= trim ($_FILES['fichero']['name'][$i]); //Eliminamos los espacios en blanco
			  $nombref= preg_replace ('[\s+]',"", $nombrefinal);//Sustituye una expresión regular
  
			  $upload= "archivos/".$nombref;  
  
			  if(file_exists('archivos')){
					$ruta_nueva=$_FILES['fichero']['tmp_name'][$i];
					if(move_uploaded_file($ruta_nueva, $upload)) { //movemos el archivo a su ubicacion 
								
							  //   echo "<b>Upload exitoso!. Datos:</b><br>";  
							//   echo "Nombre: <i><a href=\"".$ruta_nueva . $nombref."\">".$_FILES['fichero']['name']."</a></i><br>";
							  //   echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
							  //   echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
							  //   echo "<br><hr><br>";  
							printf ("Documento de la tabla clientes:");print ($documento);   
							echo "<br>";
							  $query1 = "INSERT INTO archivos (documento_cliente,ruta,tipo,size) 
							   VALUES ('$documento','".$_FILES['fichero']['name'][$i]."','".$_FILES['fichero']['type'][$i]."','".$_FILES['fichero']['size'][$i]."')"; 
							  $dbho->query($query1);
						error_reporting(0);
								
					} 
			  }else{
				  echo "La carpeta no existia y se a creado..";
				  mkdir('archivos', 0777, true);
			  }
		  }
		
		 
		 
		  
	  
  
 }
//   else
//   {
//  	echo  "Error, no se pudo hacer el registro" ;
//  }



?>

<!DOCTYPE html>
<html>
   
<head>
	
</head>
<body>
 <!-- <meta http-equiv="Refresh" content="0;url='http://localhost/Baslabgit/main_app/Admin/Edicion/consult.php'">   -->
</body>
</html>