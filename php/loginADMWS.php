<?php
if(isset($_POST)){
	include("conexion.php");
	include("../clases/empleados.php");

	$Empleado = new empleados();
    $Empleado->ConstructorLogin(@$_POST['Correo'],@$_POST['Password']);

    echo json_encode($Empleado->Login($conexion));
}
?>
