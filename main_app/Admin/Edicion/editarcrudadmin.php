<?php
require '../functions.php';
require '../../conexionbs.php';

$dbho = new conexionbs();

 if (isset($_POST['nombre']) && isset($_POST['usuario']) &&  isset($_POST['id'])){
    
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $id= $_POST['id'];
        if(isset($_POST['contraseña'])){
            $password = $_POST['Pasword'];
            $query="UPDATE `usuarios` SET `Nombre`='$nombre',`Usuario`='$usuario',`Pasword`='$contraseña' WHERE id=$id";
            $dbho -> query($query);
            echo('Datos actualizados');
        }else{
            $query1="UPDATE `usuarios` SET `Nombre`='$nombre',`Usuario`='$usuario' WHERE id=$id";
            $dbho -> query($query1);
            echo('Se actualizaron lso datos sin la contraseña');
        }
        
     } 
    
?>