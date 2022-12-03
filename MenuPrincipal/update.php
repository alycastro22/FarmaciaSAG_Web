<?php

include("../conexion.php");


$nombreempleado=$_POST['nombreempleado'];
$id_empleado=$_POST['id_empleado'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];

$sql="UPDATE empleado SET  nombreempleado='$nombreempleado',contrasena='$contrasena',correo='$correo' WHERE id_empleado='$id_empleado'";
$query=mysqli_query($conexion,$sql);

    if($query){
        echo '<script language="javascript">alert("Administrador Actualizado Exitosamente");window.location.href="MenuADM.php"</script>';
    }
?>