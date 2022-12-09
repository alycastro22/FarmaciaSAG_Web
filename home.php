<?php
include 'conexion.php';
include_once 'Cart.php'; 
$cart = new Cart;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="./images/sag.png" />
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

    <title>SAG | Productos</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div style="height: 100vh;" id="sidebar-container" class="bg-info w-25">
            <div class="logo border-bottom">
              <img src="images/sag.png" alt="" class="w-50 mx-auto d-block">
            </div>
            <div class="menu">
                <a href="home.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-today lead mr-2"></i>
                    Productos</a>
                <a href="viewCart.php" class="d-block text-light p-3 border-0"> <i class="icon ion-md-book lead mr-2"></i> Detalle de compras </a>
                <a href="viewCart.php" class="d-block text-light p-3 border-0"> <i class="icon ion-md-car lead mr-2"></i>Entregas </a>
                <a href="viewCart.php" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Cuenta </a>
                <a style="visibility: hidden;"><?php echo $_SESSION['idCliente'] = 3 ?></a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container ">

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
<a class="btn btn-info d-flex justify-content-center" href="index.php"></i>Cerrar Sesión</a>
<a href="viewCart.php" class="d-block text-light px-8 border-0"> <i style="font-size: 28px; margin-left: 25px;" class="icon ion-md-cart lead mr-2 w-25 text-info w-15"></i>
                    <span style="background: red; color: white; font-weight: bold; position: absolute; width: 24px; height: 24px; border-radius: 100%; text-align: center; margin-left: -8px; font-size: 15px;"><?php echo ($cart->total_items() > 0)?$cart->total_items():'0'; ?></a>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

          <section class="bg-light py-3 position-sticky sticky-top">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-9 col-md-8">
                        <h2 class="font-weight-bold text-info mb-0">Lista de Productos</h2>
                      </div>

                  </div>
              </div>
          </section>

          <div class="row m-3">
            <?php
            $query = $conexion->query("SELECT P.id_producto, P.nombre, P.stock, C.categoria, P.precio, P.imagen
            FROM producto AS P
            INNER JOIN categoria AS C ON P.id_categoria = C.id_categoria
            ORDER BY P.id_producto ASC");
            if($query->num_rows > 0){ 
                while($row = $query->fetch_assoc()){
            ?>
            <div class="col-sm-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <img src="data: image/png; base64, <?php echo base64_encode($row["imagen"]); ?>" alt="Imagen" style="width: 110px; height: 110px; border-radius: 10px; position: absolute; top: 10px; right: 15px;">
                  <h5 class="card-title">Nombre: <?php echo $row["nombre"]; ?></h5>
                  <p class="card-text">Unidades: <?php echo $row["stock"]; ?></p>
                  <p class="card-text">Categoría: <?php echo $row["categoria"]; ?></p>
                  <h6 class="card-text">Precio: <?php echo $row["precio"].' Lps'; ?></h6>
                  <a class="btn btn-info d-flex justify-content-center align-middle" href="cartAction.php?action=addToCart&id=<?php echo $row["id_producto"]; ?>"><i class="icon ion-md-cart lead mr-2"></i>Añadir al carrito</a>
                </div>
              </div>
            </div>
            <?php } }else{ ?>
            <p>No se encontraron productos</p>
            <?php } ?>
          </div>
    </div>
</body>

</html>