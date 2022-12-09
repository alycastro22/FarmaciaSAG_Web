<?php
include 'conexion.php';
include 'clases/clientes.php';
include 'Cart.php';
$cart = new Cart;

if($cart->total_items() <= 0){
    header("Location: index.php");
}

$_SESSION['sessCustomerID'] = $_SESSION['idCliente'];

$query = $conexion->query("SELECT * FROM usuarios WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>

<!DOCTYPE html>
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

    <title>SAG | Checkout</title>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Falló la actualización del carrito, por favor intenta otra vez.');
            }
        });
    }
    </script>
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
                        <h2 class="font-weight-bold mb-0">Confirmar Compra</h2>
                      </div>

                  </div>
              </div>
          </section>

          <div class="container">
    <table class="table table-striped table-hover font-weight-bold text-secondary ">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo $item["price"].' Lps'; ?></td>
            <td><?php echo $item["categoryDescription"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo $item["subtotal"].' Lps'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay articulos en el carrito</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td><strong class="text-primary h5 font-weight-bold">Total: <?php echo $cart->total().' Lps'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4 class="font-weight-bold">Datos del Cliente</h4>
        <p class="font-weight-bold text-secondary"><?php echo $custRow['name']; ?></p>
        <p class="font-weight-bold text-secondary"><?php echo $custRow['email']; ?></p>
    </div>
    <div class="footBtn">
        <a href="home.php" class="btn btn-outline-primary font-weight-bold"><i class="glyphicon glyphicon-menu-left"></i> Seguir comprando</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-primary orderBtn font-weight-bold">Realizar Pago <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
</div>
</div>
</body>
</html>