<?php

include("../conexion.php");

$id_empleado=$_GET['id_empleado'];

$sql="DELETE FROM empleado WHERE id_empleado='$id_empleado'";
$query=mysqli_query($conexion,$sql);

    if($query){
        echo '<script language="javascript">alert("Se a Eliminado Correctamente");window.location.href="menuADM.php"</script>';
    }
?>