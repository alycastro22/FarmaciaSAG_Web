<?php
include("../conexion.php");

$nombreempleado=$_POST['nombreempleado'];
$id_empleado=$_POST['id_empleado'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];


$sql="INSERT INTO empleado (nombreempleado, id_empleado, correo, contrasena) VALUES
('$nombreempleado','$id_empleado','$correo','$contrasena')";
$query= mysqli_query($conexion, $sql);

    if($query){
        echo '<script language="javascript">alert("Se a Registrado Correctamente");window.location.href="MenuADM.php"</script>';
    
    }else {
    echo '<script language="javascript">alert("Se a encontrado un Problema en el Registro");window.location.href="MenuADM.php"</script>';
    }
?>