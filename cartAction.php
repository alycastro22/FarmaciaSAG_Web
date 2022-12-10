<?php

include 'Cart.php';
$cart = new Cart;


include 'conexion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];

        $query = $conexion->query("SELECT P.id_producto, P.nombre, P.stock, P.id_categoria, C.categoria, P.precio
        FROM producto AS P
        INNER JOIN categoria AS C ON P.id_categoria = C.id_categoria
        WHERE P.id_producto = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id_producto'],
            'name' => $row['nombre'],
            'price' => $row['precio'],
            'category' => $row['id_categoria'],
            'categoryDescription' => $row['categoria'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'home.php';
        header("Location: home.php");
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){

        $insertOrder = $conexion->query("INSERT INTO factura (id_usuario, total, fecha) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $conexion->insert_id;
            $sql = '';

            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO detallefactura (id_factura, id_productos, precio, cantidad) VALUES ('".$orderID."', '".$item['id']."', '".$item['price']."', '".$item['qty']."');";
            }

            $insertOrderItems = $conexion->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}