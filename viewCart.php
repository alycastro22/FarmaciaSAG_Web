<?php
include 'Cart.php';
$cart = new Cart;
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

    <title>SAG | Carrito de Compras</title>
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

          <section class="bg-light py-3 position-sticky sticky-top">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-9 col-md-8">
                        <h2 class="font-weight-bold mb-0 text-info">Mi Carrito</h2>
                      </div>

                  </div>
              </div>
          </section>

          <div class="container">
    <table class="table table-striped table-hover font-weight-bold text-secondary ">
    <thead>
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>
            <th> </th>  
        </tr>
    </thead>
    <tbody>
        <?php
if ($cart->total_items() > 0) {
    $cartItems = $cart->contents();
    foreach ($cartItems as $item) {
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo $item["price"] . ' Lps'; ?></td>
            <td><?php echo $item["categoryDescription"];?></td>
            <td><input type="number" class="form-control px-1 text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo $item["subtotal"] . ' Lps'; ?></td>
            <td>
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro que deseas eliminar este producto?')"><i class="icon ion-md-trash " style="font-size: 20px;"></i></a>
            </td>
        </tr>
        <?php }} else {?>
        <tr><td colspan="6" class="text-center"><p>El carrito está vacío</p></td>
        <?php }?>
    </tbody>
    <tfoot>
        <tr >
            <td><a href="home.php" class="btn btn-outline-info font-weight-bold"><i class="icon ion-md-arrow lead"></i>
            <?php if ($cart->total_items() > 0) {
                echo 'Seguir comprando';
            } else {
                echo 'Ir a productos';
            }
            ?></a></td>
            <td colspan="3"></td>
            <?php if ($cart->total_items() > 0) {?>
            <td><strong class="text-info h5 font-weight-bold">Total: <?php echo $cart->total() . ' Lps'; ?></strong></td>
            <td><a href="checkout.php" class="btn btn-info btn-block font-weight-bold">Verificar</a></td>
            <?php }?>
        </tr>
    </tfoot>
    </table>
</div>
</div>
</body>
</html>