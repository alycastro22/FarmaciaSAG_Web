<?php
if(isset($_POST)){
	include("../php/conexion.php");
	include("../clases/detallef.php");
	$detallef= new detallef ();
    echo json_encode($detallef->listarDetalleFactura($conexion));
}
?>


