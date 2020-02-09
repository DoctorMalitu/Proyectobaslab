<?php
require '../functions.php';
require '../../conexionbs.php';
$dbho = new conexionbs();
$query="SELECT `identificacion`, `documento`, `nombre`, `apellido`, `celular`, `fecha_naci`, `genero`, `edad`, `correo`, `personal`, `empresas`, `fecha` FROM `clientes`";
$res = $dbho -> query($query);
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