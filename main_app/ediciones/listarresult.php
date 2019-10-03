<?php
require '../conexionbs.php';

$dbho = new conexionbs();
if(isset($_POST['documentoresult']) || isset($_POST['fecha_naci'])){

    $documentoresult =mysqli_real_escape_string($dbho, htmlentities( $_POST['documentoresult']));
    $fecha_naci =mysqli_real_escape_string($dbho, htmlentities( $_POST['fecha_naci']));
//    print($fecha_naci); 
    $query="SELECT  archivos.id, archivos.documento_cliente, clientes.nombre, clientes.apellido, clientes.fecha_naci, clientes.personal,clientes.empresas ,archivos.ruta FROM clientes INNER JOIN archivos ON clientes.documento=archivos.documento_cliente WHERE (clientes.documento='$documentoresult' AND clientes.fecha_naci='$fecha_naci')";
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
}else{
    print("no joda");
}




?>