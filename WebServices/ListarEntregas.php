<?php
if(isset($_POST)){
	include("../php/conexion.php");
	include("../clases/entregas.php");
	$Entrega= new Entregas();
    echo json_encode($Entrega->listarEntregas($conexion));
}
?>