<?php
require '../functions.php';
require '../../conexionbs.php';
$dbho = new conexionbs();
$query="SELECT id, Nombre, Usuario, Tipo_usuario, fecha_regis FROM usuarios WHERE Tipo_usuario='Empresa' ";
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