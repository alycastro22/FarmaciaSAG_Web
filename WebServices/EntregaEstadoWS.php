<?php
if(isset($_GET)){
	include("../php/conexion.php");
	include("../clases/entregas.php");
	$Entrega= new Entregas();
	$identrega = @$_GET['identrega'];
	$estado = @$_GET['estado'];
	
    $Entrega->ConstructorEstado($identrega,$estado);
    echo json_encode($Entrega->actualizarestado($conexion));
	header('location: ../php/gestionentrega.php');
}
?>