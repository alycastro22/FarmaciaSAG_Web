<?php
    session_start();
    require '../conexion.php';

    if(!isset($_SESSION['email'])){
      header("Location:../LoginADM.php");
      exit(0);

  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<link href="../php/Productos/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../php/Productos/assets/css/all.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
<link rel="stylesheet" href="./styleEntregas.css">

<script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>

<title>Insertar Datos</title>
</head>
<body>

<div class="container">
        <aside>
        <div class="top">
            <div class="logo">
                <center>
                    <img src="images/sag.png" alt="">
                    <h2 class="text-muted">BIENVENIDOS FARMACIA <span class="text-muted">SAG</span>   </h2>
                    <hr>
                    <h5><strong><?php echo $_SESSION['email'];?> </strong></h5>
                </center>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">cancel</span>
            </div>
        </div>

        <div class="sidebar">
            <a href="#">
                <span class="material-icons-sharp">group</span>
                    <h3>Clientes</h3>

            </a>

            <a href="#" >
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

            <a href="Entregas.php" class="active">
                <span class="material-icons-sharp">
                    local_shipping
                    </span>
                    <h3>Entregas</h3>

            </a>
            
            <a href="../php/Login/CerrarSesion.php">
                <span class="material-icons-sharp">
                    logout
                    </span>
                    <h3>Cerrar Sesión</h3>

            </a>
        
        </div>
    </aside>

    <?php if (isset($_POST["Direccion"])){
        $query = 'INSERT INTO entrega (id_factura, Direccion,Telefono, estado)
                      VALUES(\''.$_POST["idFactura"].'\',\''.$_POST["Direccion"].'\',\''.$_POST["Telefono"].'\', "Proceso")';
        $result = mysqli_query($conexion,$query) or die(mysqli_error());
    ?>
        
    <?php } ?>

    <div class="container-fluid">

    <div class="formulario">
      <div class="superior">
        <h2 class="text-center">Entregas</h2>
          <form class="row g-3 needs-validation"  method="POST" enctype="multipart/form-data">
            <hr>
              <div class="mb-4">
                <label for="idFactura" class="form-label">Numero Factura:</label>
                <select type="text" name="idFactura" id="idFactura" class="form-control" required>
                  <option value="">Seleccionar...</option>
                  <?php
                    $sql = $conexion->query("SELECT * FROM factura");
                    while ($fila = $sql ->fetch_array()) {
                     echo "<option value=".$fila['id_factura'].">".$fila['numero']."</option>";

                    //$sql = $conexion->query("SELECT * FROM usuarios");
                    //while ($fila = $sql ->fetch_array()) {
                    //  echo "<option value=".$fila['id'].">".$fila['name']."</option>";
                    } ?>
                    
                </select>   
              </div>

              <div class="mb-4">
                <label for="Direccion" class="form-label">Direccion:</label>
                <input type="text" name="Direccion" id="Direccion" class="form-control" placeholder="Ingrese direccion" required>
              </div>

              <div class="mb-4">
                <label for="Telefono" class="form-label">Telefono:</label>
                <input type="text" name="Telefono" id="Telefono" class="form-control" placeholder="Ingrese telefono" required>
              </div>

              <div class="row justify-content-center">
                <div class="col-auto">
                  <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#entregaModal">
                    <i class="fa-solid fa-circle-plus"></i> Enviar</button>
              </div>
        </form>

      

      <script>
        (function () {
          'use strict'

          var forms = document.querySelectorAll('.needs-validation')

          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }
                form.classList.add('was-validated')
              }, false)
            })
        })
      </script>

      <?php include 'EntregaModal.php'; ?>
      <script src = "../php/Productos/assets/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
  
  </body>
</html>