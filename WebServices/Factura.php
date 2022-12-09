<?php
if(isset($_POST)){
	include("../php/conexion.php");
	include("../clases/factura.php");
	$factura= new factura ();
    echo json_encode($factura->listarFactura($conexion));
}
?>