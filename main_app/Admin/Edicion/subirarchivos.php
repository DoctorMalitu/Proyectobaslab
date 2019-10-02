<?php

require '../functions.php';
require '../../conexionbs.php';
$dbho = new conexionbs();

$documento =mysqli_real_escape_string($dbho, htmlentities( $_POST['documento']));
if (isset($_FILES['fichero'])) {   
 
   
      $contador=count($_FILES['fichero']['name']);
      //    
      // creamos las variables para subir a la db
      
        for($i=0;$i<=$contador;$i++){
             
            $nombrefinal= trim($_FILES['fichero']['name'][$i]); //Eliminamos los espacios en blanco
            $nombref= preg_replace ('[\s+]',"", $nombrefinal);//Sustituye una expresión regular
            echo $nombref;
            $upload= "../../archivos/".$nombref;  
            echo $upload;
            if(file_exists('../../archivos')){
                  $ruta_nueva=$_FILES['fichero']['tmp_name'][$i];
                  if(move_uploaded_file($ruta_nueva, $upload)) { //movemos el archivo a su ubicacion 
                              
                            //   echo "<b>Upload exitoso!. Datos:</b><br>";  
                            //   echo "Nombre: <i><a href=\"".$ruta_nueva . $nombref."\">".$_FILES['fichero']['name']."</a></i><br>";  
                            //   echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                            //   echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                            //   echo "<br><hr><br>";  
                            printf ("Documento de la tabla clientes:");print ($documento);  
                            $query = "INSERT INTO archivos (documento_cliente,ruta,tipo,size) 
                             VALUES ('$documento','".$_FILES['fichero']['name'][$i]."','".$_FILES['fichero']['type'][$i]."','".$_FILES['fichero']['size'][$i]."')";
                            $dbho->query($query);
                            
                      error_reporting(0);
                              
                  } 
            }else{
                echo "La carpeta no existia y se a creado..";
                mkdir('archivos', 0777, true);
            }
        }
      
      
       
        
    
}else{
   print('error, el campo de archivo esta vacio...');
}

?> 