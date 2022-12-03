<?php
    if(isset($_POST))
    {
    	include("conexion.php");
    	include("../clases/Log.php");

    	$Log = new Log();
	
    	$Log->ConstructorSobrecargado(@$_POST['Usuario'], @$_POST['Evento'], @$_POST['Fecha']);
    	echo json_encode($Log->guardarEvento($conexion));
    }
?>