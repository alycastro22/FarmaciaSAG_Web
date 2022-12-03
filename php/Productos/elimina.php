<?php

    session_start();

    require '../../conexion.php';

    $id = $conexion->real_escape_string($_POST['id']);
   
    $sql = "DELETE FROM producto WHERE id_producto = '$id'";

    if ($conexion->query($sql)) {
        
        $dir = "imagenes";
        $imagen = $dir . '/' . $id . '.jpg';
        
        if(file_exists($imagen)){
            unlink($imagen);
        }

        $_SESSION['color'] = "success";
        $_SESSION['msg'] = "Registro eliminado";

    }else{
        $_SESSION['color'] = "danger";
        $_SESSION['msg'] = "Error al eliminar registro";
    }

    header('Location: Productos.php');


?>