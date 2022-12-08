<?php
    include("../conexion.php");

    $sql="SELECT * FROM empleado";
    $query=mysqli_query($conexion, $sql);

    $row=mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
        <h2 class="text-muted">Bienvenido Farmacia <span class="text-muted">SAG</span>   </h2>
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
            <h3>Gestión Admin</h3>

    </a>
    <a href="../php/Productos/Productos.php">
                <span class="material-icons-sharp">
                    healing
                    </span>
                    <h3> Gestion Productos</h3>

            </a>


            <a href="../php/gestionentrega.php">
                <span class="material-icons-sharp">
                    local_shipping
                    </span>
                    <h3> Gestion Entregas</h3>
                    


            </a>
            
            <a href="../php/Login/CerrarSesion.php">
                <span class="material-icons-sharp">
                    logout
                    </span>
                    <h3>Cerrar Sesión</h3>

            </a>

<form action="insertaradmin.php" method="POST"> 
</div>
    </aside>

    <div class="formulario"> 
          
        <h1 class="titulo">Gestión de Administradores</h1>
        <br>  <br><br><br> 
       
    

            <div class="superior">      
                 
                <br>
                <i class="fa-solid fa-user"></i>
                <input class="input-field" type="text" name="nombreempleado" id="nombreempleado" class="form-control" placeholder="Ingrese Nombre" required>     
            
                <i class="fa-solid fa-scroll"></i>
                <input class="input-field" type="text" name="id_empleado" id="id_empleado" class="form-control" placeholder="ID del Empleado" required>
                
            </div>
        
            <div class="inferior">
                <i class="fa-regular fa-envelope"></i>
                <input class="input-field" type="email" name="correo" id="correo" class="form-control" placeholder="Ingrese Correo" required>
            
                <i class="fa-solid fa-lock"></i>
                <input class="input-field" type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese Contraseña" required>
            </div>
                <input type="submit" name="Guardar" value="Guardar" class="botonAct">
        <br>
        <br>
        <br>  
        <br>  

<div class="col-md-8">
	<table class="table">
    <thead class="table-success table-striped" >
        <tr>
            <th>Nombre</th>
            <th>ID</th>
            <th>Correo</th>
            <th>Contrasena</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * FROM empleado";
            $query_run = mysqli_query($conexion, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $empleado)
                {
                    ?>
                    <tr>
                        <td><?= $empleado['nombreempleado']; ?></td>
                        <td><?= $empleado['id_empleado']; ?></td>
                        <td><?= $empleado['correo']; ?></td>
                        <td><?= $empleado['contrasena']; ?></td>
                        <td>
                        <th><a href="actualizaradmin.php?id_empleado=<?php echo $row['id_empleado'] ?>" class="botonEdi">Editar</a></th>
                        <th><a href="eliminaradmin.php?id_empleado=<?php echo $row['id_empleado'] ?>" class="botonEli">Eliminar</a></th>
                        <th><a href="recuperaradmin.php?id_empleado=<?php echo $row['id_empleado'] ?>" class="botonRecu">Restablecer</a></th>
                        </td>
                    </tr>
                    <?php
                }
            }
            else
            {
                echo "<h5> No se encontraton Registros </h5>";
            }
        ?>
        
    </tbody>
    </table>

</div>
</form>
    </div>

</div>


</html>