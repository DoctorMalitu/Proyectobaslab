<?php
require '../functions.php';
require '../../conexionbs.php';

if (isset($_GET['ids'])) {
    $dbho= new conexionbs();
    $ids=$_GET['ids'];
	$query="SELECT  archivos.id, archivos.documento_cliente, clientes.nombre, clientes.apellido, clientes.personal,clientes.empresas ,archivos.ruta FROM clientes INNER JOIN archivos ON clientes.documento=archivos.documento_cliente WHERE archivos.documento_cliente='$ids'";
    $res=$dbho->query($query);
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
}
else {
    // header("location:index.html");
    print('ese id no existe');
}
?>