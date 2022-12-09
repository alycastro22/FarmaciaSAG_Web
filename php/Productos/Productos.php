<?php
    session_start();
    require '../../conexion.php';

    $sqlProductos = "SELECT p.id_producto, p.nombre, p.precio, p.stock, p.fechavencimiento, p.estado,
    g.categoria AS categoria FROM producto AS p
    INNER JOIN categoria AS g ON p.id_categoria=g.id_categoria";
    $productos = $conexion->query($sqlProductos);

    $dir = "imagenes/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="../../MenuPrincipal/styleProductos.css">
    <script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>


</head>
<body>
        
    <div class="container">
        <aside>
        <div class="top">
            <div class="logo">
                <center>
                    <img src="../../MenuPrincipal/images/sag.png" alt="">
                    <h2 class="text-muted">BIENVENIDOS FARMACIA <span class="text-muted">SAG</span>   </h2>
                    

                </center>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">cancel</span>
            </div>
        </div>

        <div class="sidebar">
            <a href="../Empleados/Empleados.php">
                <span class="material-icons-sharp">group</span>
                    <h3>Gestión Admin</h3>

            </a>

            <a href="#" class="active">
                <span class="material-icons-sharp">
                    healing
                    </span>
                    <h3>Gestion Productos</h3>

            </a>

            <a href="../gestionentrega.php">
                <span class="material-icons-sharp">
                    local_shipping
                    </span>
                    <h3>Gestion Entregas</h3>

            </a>
            
            <a href="../Login/CerrarSesion.php">
                <span class="material-icons-sharp">
                    logout
                    </span>
                    <h3>Cerrar Sesión</h3>

            </a>
        
        </div>
    </aside>

    <div class="formulario">
        <div class="superior"> 
        <h2 class="text-center">Gestion de Productos</h2>

        <hr>

        <?php if(isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
            <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php 
            unset($_SESSION['color']);
            unset($_SESSION['msg']);
        } ?>


        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"> 
                    <i class="fa-solid fa-circle-plus"> </i> Nuevo Registro</a>
            </div>
        </div>

        <div class="text-center">

        <table class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>ID Categoria</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha de vencimiento</th>
                    <th>Imagen</th>
                    <th>Accion</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row_producto = $productos->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row_producto['id_producto']; ?></td>
                        <td><?= $row_producto['nombre']; ?></td>
                        <td><?= $row_producto['categoria']; ?></td>
                        <td><?= $row_producto['precio']; ?></td>
                        <td><?= $row_producto['stock']; ?></td>
                        <td><?= $row_producto['fechavencimiento']; ?></td>
                        <td><img src="<?= $dir . $row_producto['id_producto']. '.jpg?n=' . time(); ?>" width="100"></td>
                        <td>

                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                            data-bs-target="#editaModal" data-bs-id="<?= $row_producto['id_producto']; ?>"><i 
                            class="fa-solid fa-pen-to-square"></i> Editar</a>

                        </td>
                        <td>
                        <?php
                            require '../../conexion.php';

                            $sqlProductos = "SELECT * FROM producto";
                            
                            

                            if($row_producto['estado']==1){
                                echo '<p><a class="btn btn-sm btn-success" href="estado.php?id_producto='.$row_producto['id_producto'].'&estado=0">Habilitar</a></p>';
                            }else{
                                echo '<p><a class="btn btn-sm btn-danger" href="estado.php?id_producto='.$row_producto['id_producto'].'&estado=1">Inhabilitar</a></p>';
                            }
                            ?>
                        </td> 
                    </tr>
                <?php  } ?>

            </tbody>
        </table>
    </div>

    <?php
        $sqlCategoria = "SELECT id_categoria, categoria FROM categoria";
        $categorias = $conexion->query($sqlCategoria);
    ?>

    <?php include 'NuevoModal.php'; ?>

    <?php $categorias->data_seek(0); ?>

    <?php include 'EditaModal.php'; ?>

    <?php include 'EliminaModal.php'; ?>

    <script>

        let editaModal = document.getElementById('editaModal')
        let eliminaModal = document.getElementById('eliminaModal')

        editaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputId = editaModal.querySelector('.modal-body #id')
            let inputNombre = editaModal.querySelector('.modal-body #nombre')
            let inputIdCategoria = editaModal.querySelector('.modal-body #idCategoria')
            let inputPrecio = editaModal.querySelector('.modal-body #precio')
            let inputStock = editaModal.querySelector('.modal-body #stock')
            let inputFechaVencimiento = editaModal.querySelector('.modal-body #fechaVencimiento')
            let imagen = editaModal.querySelector('.modal-body #producto_img')

            let url= "getProducto.php"
            let formData = new FormData()
            formData.append('id', id)
            
            fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {

                inputId.value = data.id_producto
                inputNombre.value = data.nombre
                inputIdCategoria.value = data.id_categoria
                inputPrecio.value = data.precio
                inputStock.value = data.stock
                inputFechaVencimiento.value = data.fechavencimiento
                imagen.src = '<?= $dir ?>' + data.id_producto + '.jpg'

            }).catch(err => console.log(err))
        })

        eliminaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            eliminaModal.querySelector('.modal-footer #id').value = id

        })

    </script>

    <script src = "assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>