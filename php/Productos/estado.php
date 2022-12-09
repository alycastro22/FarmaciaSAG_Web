<?php
    include("../conexion.php");

    $id=$_GET['id_producto'];
    $estado=$_GET['estado'];

    $q="update producto set estado=$estado where id_producto=$id";

    mysqli_query($conexion,$q);

    header('location:Productos.php');
?>