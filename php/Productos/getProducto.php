<?php

    require '../../conexion.php';

    $id = $conexion->real_escape_string($_POST['id']);

    $sql = "SELECT id_producto, nombre, id_categoria, precio, stock, fechavencimiento FROM producto WHERE id_producto=$id LIMIT 1";
    $resultado = $conexion->query($sql);
    $rows  = $resultado->num_rows;
    $producto = [];
    if ($rows > 0) {
        $producto = $resultado->fetch_array();
    }
    echo json_encode($producto,JSON_UNESCAPED_UNICODE);
