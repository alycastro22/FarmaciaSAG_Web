<?php
include("Respuesta.php");

class detallef{
    public $id_detallefactura;
    public $id_factura;
    public $id_productos;
    public $precio;
    public $isv;
    public $cantidad;

    public function ConstructorSobrecargado($id_detallefactura, $idfactura, $id_productos, $precio, $isv,  $cantidad){
        $this->id_detallefactura=$id_detallefactura;
        $this->idfactura=$idfactura;
        $this->id_productos=$id_productos;
        $this->precio=$precio;
        $this->cantidad=$cantidad;
    
    }
    public function ConstructorEntrega($id_detallefactura, $id_factura, $id_productos, $precio, $cantidad){
        $this->id_detallefactura=$id_detallefactura;
        $this->idfactura=$idfactura;
        $this->id_productos=$id_productos;
        $this->precio=$precio;
        $this->cantidad=$cantidad;
        
    }
    public function listarDetalleFactura($Conexion){
        $query = "SELECT DF.id_detallefactura, F.numero, P.nombre, P.precio,DF.isv, DF.cantidad From detallefactura as DF
        Inner Join factura as F ON DF.id_factura=F.id_factura 
        Inner JOIN producto as P on P.id_producto=DF.id_productos";

        $resultado = mysqli_query($Conexion, $query);
        $lista = array();
        while ($row = mysqli_fetch_array($resultado))
        {
            $detallefactura = new detallef();
            $detallefactura->ConstructorSobrecargado($row['id_detallefactura'],$row['numero'],$row['nombre'],$row['precio'],$row['isv'],$row['cantidad']);
            $lista[]=$detallefactura;
        }
        return $lista;
    }


    public function actualizardetalle($Conexion){
        
        $query = "UPDATE detallefactura SET id_productos='$this->id_productos', precio='$this->precio', isv='$this->isv', cantidad='$this->cantidad' WHERE id_detallefactura='$this->id_detallefactura'";
        $respuesta = new Respuesta();

        if($this->id_productos=""){
            $respuesta->Error("Ingrese Producto");

         } elseif($this->precio=""){
                $respuesta->Error("Ingrese Precio");

        }  elseif($this->isv=""){
                    $respuesta->Error("Ingrese ISV");

         } elseif($this->cantidad=""){
                        $respuesta->Error("Ingrese Cantidad");

        }else{
            if(mysqli_query($Conexion,$query)){
                
                    
                    $respuesta->correcto("Detalle Factura Actualizado Correctamente.");
                return $respuesta;
    
                
                
            } else {
                $respuesta->Error("Problema al Modificar" . $Conexion->error);
                return $respuesta;
            }

        }
        
    }









}



?>



