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
		
		
</div>
    </aside>

    </aside>

    <div class="formulario">
	<form action="update.php" method="POST">
          
        <h1 class="titulo">Actualizar Informacion de Administrador</h1>
        <br>  <br><br><br> 
       
    

            <div class="superior">      
                 
				<input type="hidden" name="id_empleado" value="<?php echo $row['id_empleado']  ?>">
                <br>
                <i class="fa-solid fa-user"></i>
                <input class="input-field" type="text" name="nombreempleado" id="nombreempleado" class="form-control" placeholder="Ingrese Nombre" required value="<?php echo $row['nombreempleado']  ?>">     
            
                
            </div>
		            <div class="superior">      
                     
            
                <i class="fa-regular fa-envelope"></i>
                <input class="input-field" type="email" name="correo" id="correo" class="form-control" placeholder="Ingrese Correo" required value="<?php echo $row['correo']  ?>">
                
            </div>
        
            <div class="inferior">
            
                <i class="fa-solid fa-lock"></i>
                <input class="input-field" type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese Contraseña" required value="<?php echo $row['contrasena']  ?>">
            </div>
                 <input type="submit" class="botonEdi2" value="Actualizar">
    </form>
</html>