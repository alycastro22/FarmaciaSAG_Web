<?php
if(isset($_POST))
{
	//alert("llegaa¿ aqui");
	//Incluir las clases que necesita el login
	include("conexion.php");
	include("../clases/usuarios.php");


	$Usuario = new usuarios();
	$Usuario->ConstructorLogin(@$_POST['Correo'], @$_POST['Password']);
	echo json_encode($Usuario->Login($conexion));
}
?>
