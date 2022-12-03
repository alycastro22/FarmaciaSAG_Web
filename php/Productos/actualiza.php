<?php

    session_start();

    require '../../conexion.php';

    $id = $conexion->real_escape_string($_POST['id']);
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $idCategoria = $conexion->real_escape_string($_POST['idCategoria']);
    $precio = $conexion->real_escape_string($_POST['precio']);
    $stock = $conexion->real_escape_string($_POST['stock']);
    $fechaVencimiento = $conexion->real_escape_string($_POST['fechaVencimiento']);

    $sql = "UPDATE producto 
    SET nombre = '$nombre', id_categoria = '$idCategoria', precio = '$precio', 
    stock = '$stock', fechavencimiento = '$fechaVencimiento' WHERE id_producto = '$id'";

    if ($conexion->query($sql)) {

        $_SESSION['color'] = "success";
        $_SESSION['msg'] = "Registro actualizado";
        
        if($_FILES['imagen']['error'] == UPLOAD_ERR_OK){
            $permitidos = array("image/jpg", "image/jpeg", "image/png");
            if(in_array($_FILES['imagen']['type'], $permitidos)){

                $dir = "imagenes";

                $info_img = pathinfo($_FILES['imagen']['name']);
                $info_img['extension'];

                $imagen = $dir . '/' . $id . '.jpg';
                
                if(!file_exists($dir)){
                    mkdir($dir, 0777);
                }
     
                if(!move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)){
                    $_SESSION['color'] = "danger";
                    $_SESSION['msg'] .= "<br>Error al guardar imagen";
                }
            }else{
                $_SESSION['color'] = "danger";
                $_SESSION['msg'] .= "<br>Formato de imagen no permitido";
            }
        }

    }else{
        $_SESSION['color'] = "danger";
        $_SESSION['msg'] = "Error al guardar imagen";
    }

    header('Location: Productos.php');


?>