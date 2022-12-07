<?php
    session_start();
    require 'conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="../css/style.css">
    <script src='../js/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
   
    
</head>
<body>
    
<div class="container">
    <aside>
            <div class="top">

                <div class="logo">
                    <center>
                        <img src="../images/sag.png" alt="">
                        <h2 class="text-muted">BIENVENIDOS FARMACIA <span class="text-muted">SAG</span>   </h2>
                    </center>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">cancel</span>

                </div>
            </div>
        <div class="sidebar">
            
            <a href="../MenuPrincipal/menuADM.php" >
                <span class="material-icons-sharp">
                        group
                        </span>
                    </span>
                    <h3>Gestión Usuario</h3>

            </a>

            <a href="../php/Productos/Productos.php">
                <span class="material-icons-sharp">
                    healing
                    </span>
                    <h3> Gestion Productos</h3>

            </a>


            <a href="#" class="active">
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
            </div>
    </aside>

       

    

    <div class="formulario"> 
        <h1 class="titulo">Gestión de Entregas</h1>
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="reporteEntregas.php" class="btn btn-primary"> 
                    <i class="fa-solid fa-circle-plus"> </i>Reporte PDF</a>
            </div>
        </div>
        <br>

        <div class="superior"> 
                <table class ='table'>
                    <thead>
                        <tr>
                            <th>Id Entrega</th>
                            <th>Número Factura</th>
                            <th>Cliente</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>
                    <tbody id="entregas">


                    </tbody>

                </table>   


         </div>
    </div>

</div>  


</body>
</html>

<script>

		(function(){
				getListaEntregas();
			})();

		function getListaEntregas(){
			$.post("../WebServices/ListarEntregas.php",
			{},
			function(data){
				var respuesta = JSON.parse(data);
				html = "";
				for(var i in respuesta){
				html += "<tr><td>"+respuesta[i].identrega+"</td>";
				html += "<td>"+respuesta[i].idfactura+"</td>";
				html += "<td>"+respuesta[i].nombreu+"</td>";
				html += "<td>"+respuesta[i].direccion+"</td>";
				html += "<td>"+respuesta[i].telefono+"</td>";
				html += "<td>"+respuesta[i].estado+"</td>";
                    if(respuesta[i].estado=="Proceso"){
                        html += "<td><a class='link_enviar' href='../WebServices/EntregaEstadoWS.php?identrega="+respuesta[i].identrega+"&estado=Enviada'>Enviar</a></td>";
                        html += "<td><a class='link_cancelar' href='../WebServices/EntregaEstadoWS.php?identrega="+respuesta[i].identrega+"&estado=Cancelada' >Cancelar</a></td></tr>";

                    }else{
                        "</tr>"; 
                    }
				}
				document.getElementById('entregas').innerHTML = html;
			}
			);
		}
	
	</script>