<?php
include 'conexion.php';
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./css/estilo1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Productos</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <a href="carritoc.php" class="btn btn-primary">Ver Carrito</a>
                </div>
            </div>
        </div>
    </header>

    <!--Contenido-->
    <main>
        <!--CargarProductos-->
        <div class="container">
            <br>
            <br>

            <div class="row m-3">
                <?php
                $query = $conexion->query("SELECT id_producto, nombre, precio, imagen FROM producto");

                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                ?>
                        <div class="col-sm-4 mb-3">
                            <div class="card">

                                <?php
                                $id = $row["id_producto"];
                                $imagen = "images/Productos/" . $id . "/principal.webp";

                                if (!file_exists($imagen)) {
                                    $imagen = "images/no-photo.jpg";
                                }
                                ?>
                                <div class="card-body">
                                    <img width="150" src="data: image/png; base64, <?php echo base64_encode($row['imagen']); ?>">
                                    <h5 class="card-title"><?php echo $row["nombre"]; ?></h5>
                                    <br>
                                    <!--<h6 class="card-text"><?php echo $row["precio"] . ' Lps'; ?></h6>-->
                                    <a href="carritoc.php" <?php echo $row["id_producto"]; ?> class="btn btn-success">Añadir al carrito</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>