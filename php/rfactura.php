<?php
    session_start();
    require '../../conexion.php';

    $sqlProductos = "SELECT p.id_producto, p.nombre, p.precio, p.stock, p.fechavencimiento, 
    g.categoria AS categoria FROM producto AS p
    INNER JOIN categoria AS g ON p.id_categoria=g.id_categoria";
    $productos = $conexion->query($sqlProductos);

    $dir = "imagenes/";
    ob_start();

?>