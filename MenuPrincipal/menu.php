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
            <h3>Gestión Usuario</h3>

    </a>

    <a href="#">
        <span class="material-icons-sharp">
            healing
            </span>
            <h3>Productos</h3>

    </a>

    <a href="#">
        <span class="material-icons-sharp">
            shopping_cart
            </span>
            <h3>Detalle Compras</h3>

    </a>

    <a href="#">
        <span class="material-icons-sharp">
            local_shipping
            </span>
            <h3>Entregas</h3>

    </a>
    
    <a href="#">
        <span class="material-icons-sharp">
            logout
            </span>
            <h3>Cerrar Sesión</h3>

    </a>
   
           
       

    
</div>
    </aside>

    <div class="formulario"> 
          
        <h1 class="titulo">Gestión de Usuario</h1>
        <br>  <br><br><br> 
       
        <i class="fa-sharp fa-solid fa-rotate-right"></i>
        <input type ="submit" name="Actualizar" value="Actualizar Usuario" class="botonAct">
    
        
        <div class="superior">      
                  
            <br>
            <i class="fa-solid fa-user"></i>
            <input class="input-field" type="text" name="nombre" id="Nombre" class="form-control" placeholder="Ingrese Nombre">     
            
            <i class="fa-solid fa-cake-candles"></i>
            <input class="input-field" type="text" name="FechaNac" id="FechaNac" class="form-control" placeholder="Fecha de Nacimiento">
             
            <i class="fa-solid fa-scroll"></i>
            <input class="input-field" type="text" name="RTN" id="RTN" class="form-control" placeholder="RTN">
        </div>
        
        <br>
        <div class="inferior">

            <i class="fa-solid fa-map-pin"></i>
            <input class="input-field" type="text" name="dirección" id="Dirección" class="form-control" placeholder="Ingrese Dirección">
            
            <i class="fa-regular fa-envelope"></i>
            <input class="input-field" type="text" name="correo" id="correo" class="form-control" placeholder="Ingrese Correo">
            
            <i class="fa-solid fa-lock"></i>
            <input class="input-field" type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese Contraseña">
        </div>
       
        <br>  
        <i class="fa-solid fa-user-xmark"></i>     
        <input type ="submit" name="Eliminar" value="Inhabilitar Usuario" class="botonEli">
</form>
    </div>

</div>


</body>
</html>