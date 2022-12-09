<?php
include_once 'Cart.php'; 
$cart = new Cart; 
if(!isset($_REQUEST['id'])){
    header("Location: home.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="./imagenes/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Scripts     -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>SAG | Confirmación</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div style="height: 100vh;" id="sidebar-container" class="bg-primary w-25">
            <div class="logo">
            <img src="images/sag.png" alt="" class="w-50 mx-auto d-block">
            </div>
            <div class="menu">
                <a href="home.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-today lead mr-2"></i>
                    Productos</a>
                    <a href="viewCart.php" class="d-block text-light p-3 border-0"> <i class="icon ion-md-book lead mr-2"></i> Detalle de compras </a>
                <a href="viewCart.php" class="d-block text-light p-3 border-0"> <i class="icon ion-md-car lead mr-2"></i>Entregas </a>
                <a href="viewCart.php" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Cuenta </a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline position-relative d-inline-block my-2">
                  <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                  <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                </form>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
</li>
<a class="btn btn-info d-flex justify-content-center " href="index.php"></i>Cerrar Sesión</a>
<a href="viewCart.php" class="d-block text-light px-8 border-0"> <i style="font-size: 28px; margin-left: 25px;" class="icon ion-md-cart lead mr-2 w-25 text-info w-15"></i>
                    <span style="background: red; color: white; font-weight: bold; position: absolute; width: 24px; height: 24px; border-radius: 100%; text-align: center; margin-left: -8px; font-size: 15px;"><?php echo ($cart->total_items() > 0)?$cart->total_items():'0'; ?></a>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

          <section class="bg-light py-3">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-9 col-md-8">
                        <h2 class="font-weight-bold mb-0">¡Listo!</h2>
                      </div>

                  </div>
              </div>
          </section>
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
          <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 mr-3" width="35" height="35" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div class="">
        Su compra fue realizada exitosamente.
    </div>
    </div>
    </div>
</body>

</html>