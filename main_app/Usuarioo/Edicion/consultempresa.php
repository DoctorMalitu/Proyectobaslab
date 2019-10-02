<?php
require '../../conexionbs.php';
require '../functionsus.php';


$dbho = new conexionbs();
$nombreempresa=$_SESSION['usuario']['Nombre'];
// print($nombreempresa);
$query="SELECT `identificacion`, `documento`, `nombre`, `apellido`, `fecha_naci`, `genero`, `edad`, `empresas`, `fecha` FROM `clientes` WHERE empresas='$nombreempresa'";
$res = $dbho->query($query);
if(!$res)
{
    die("ERROR");
}else{
    $array["row"] = [];
    while ($row = mysqli_fetch_array($res)) {
        $arreglo["row"][]=$row;
    }
   echo json_encode($arreglo);
}
mysqli_free_result($res);


?>