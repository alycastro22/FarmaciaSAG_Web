<?php 
    include("../conexion.php");


$id_empleado=$_GET['id_empleado'];

$sql="SELECT * FROM empleado WHERE id_empleado='$id_empleado'";
$query=mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
    	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    	<link rel="stylesheet" href="./style.css">
    	<script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
        
    </head>
<body>
    
    <div class="container">
    <aside>
<div class="top">

    <div class="logo">
        <center>
        <img src="./images/sag.png" alt="">
        <h2 class="text-muted">BIENVENIDOS FARMACIA <span class="text-muted">SAG</span>   </h2>
    </center>
    </div>
    <div class="close" id="close-btn">
        <span class="material-icons-sharp">cancel</span>

    </div>
</div>
<div class="sidebar">
    
    <a href="#" class="active">
        <span class="material-icons-sharp">
                group
                </span>
            </span>
            <h3>Gestión Admins</h3>

    </a>

    <a href="#">
        <span class="material-icons-sharp">
            logout
            </span>
            <h3>Cerrar Sesión</h3>
    </a>
            
	</body>	
