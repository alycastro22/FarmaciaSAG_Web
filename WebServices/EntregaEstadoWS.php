<?php
if(isset($_POST)){
	include("../php/conexion.php");
	include("../clases/entregas.php");
	$Entrega= new Entregas();
    $Entrega->ConstructorEstado(@$_POST['identrega'],@$_POST['estado']);
    echo json_encode($Entrega->actualizarestado($conexion));
}
?>