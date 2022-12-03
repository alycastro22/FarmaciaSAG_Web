<?php

    session_start();

    require '../../conexion.php';

    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $idCategoria = $conexion->real_escape_string($_POST['idCategoria']);
    $precio = $conexion->real_escape_string($_POST['precio']);
    $stock = $conexion->real_escape_string($_POST['stock']);
    $fechaVencimiento = $conexion->real_escape_string($_POST['fechaVencimiento']);

    $sql = "INSERT INTO producto (nombre, id_categoria, precio, stock, fechavencimiento)
    VALUES ('$nombre', '$idCategoria', '$precio', '$stock', '$fechaVencimiento')";
    if ($conexion->query($sql)) {
        $id = $conexion->insert_id;

        $_SESSION['color'] = "success";
        $_SESSION['msg'] = "Registro guardado";

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