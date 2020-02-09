<?php
require '../functions.php';
require '../../conexionbs.php';

$dbho = new conexionbs();

 if (isset($_POST['identificacion'])){
    /* 	echo '<pre>';
        var_export($_POST);
        echo '<pre>';
        exit; */
        $identificacion = $_POST['identificacion'];
        $documento = $_POST['documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['celular'];
        $fecha_naci = $_POST['fecha_naci'];
        $genero = $_POST['genero'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        $personal= $_POST['personal'];
        $empresas = $_POST['empresas'];
        $id= $_POST['id'];
    
        $query="UPDATE `clientes` SET `identificacion`='$identificacion',`documento`='$documento',`nombre`='$nombre',`apellido`='$apellido', `celular`='$celular', `fecha_naci`='$fecha_naci',`genero`='$genero',`edad`='$edad',`correo`='$correo',`personal`='$personal',`empresas`='$empresas' WHERE documento=$id";
        $dbho -> query($query);
        echo('Datos actualizados');
     } 

?>