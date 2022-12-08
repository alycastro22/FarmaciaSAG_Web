<?php

    include("Respuesta.php");

    class Producto
    {
        public $id_producto;
        public $nombre;
        public $id_categoria;
        public $precio;
        public $stock;
        public $fechavencimiento;
        public $imagen;
        public $estado;

        public function constructorSobrecargado($id_producto,$nombre,$id_categoria,$precio,
        $stock,$fechavencimiento,$imagen,$estado)
        {
            $this->id_producto = $id_producto;
            $this->nombre = $nombre;
            $this->id_categoria = $id_categoria;
            $this->precio = $precio;
            $this->stock = $stock;
            $this->fechavencimiento = $fechavencimiento;
            $this->imagen = $imagen;
            $this->estado = $estado;
        }

        public function obtenerProductos($Conexion)
        {
            $respuesta = new Respuesta();

            $resultado = mysqli_query($Conexion,"SELECT id_producto, nombre, precio, imagen FROM productos WHERE estado = '$this->estado'");
            $data = $resultado->fetch_assoc();


            

        }

    }



?><!--<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<?php //foreach($resultado as $row) { ?>
    
    <div class="col">
    <div class="card shadow-sm">

        <?php
            $id = $row['id_producto']; 
            //<img src="https://cdn.shopify.com/s/files/1/0024/6058/1940/products/ibuprofeno-600-mg-x-20-comprimidos-ascend-862511.webp?v=1661198468">
        ?>                                                                                    
                                
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
            <p class="card-text">Lps. <?php echo $row['precio']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
                <a href="#" class="btn btn-success">Detalles</a>
            </div>
        </div>
    </div>
</div>
<?php //} ?>                
</div> -->