<?php
if(isset($_POST)){
	include("conexion.php");
	include("../clases/usuarios.php");
  $Usuario = new usuarios();
  $Usuario->ConstructorLogin(@$_POST['Correo'],@$_POST['Password']);

    echo json_encode($Usuario->guardarUsuario($conexion));
}
?>
