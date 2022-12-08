<?php
include("Respuesta.php");

class factura{
   
    public $id_factura;
    public $id_usuario;
    public $numero;
    public $id_tipopago;
    public $fecha;

    public function ConstructorSobrecargado( $idfactura, $id_usuario, $numero, $id_tipopago,  $fecha){
        
        $this->idfactura=$idfactura;
        $this->id_usuario=$id_usuario;
        $this->numero=$numero;
        $this->id_tipopago=$id_tipopago;
        $this->fecha=$fecha;
    
    }
    public function ConstructorFactura($id_factura, $id_usuario, $numero, $id_tipopago,$fecha){
        
        $this->idfactura=$idfactura;
        $this->id_usuario=$id_usuario;
        $this->numero=$numero;
        $this->id_tipopago=$id_tipopago;
        $this->fecha=$fecha;
        
    }
    //AQUI//
    public function listarFactura($Conexion){
        $query = "SELECT F.id_factura, F.numero, U.name, TP.TipodePago,F.fecha From factura as F
        Inner Join usuarios as U ON U.id_cliente=F.id_usuario
        Inner JOIN tipodepago as TP on TP.id_tipodepago=F.id_tipopago";

        $resultado = mysqli_query($Conexion, $query);
        $lista = array();
        while ($row = mysqli_fetch_array($resultado))
        {
            $factura = new factura();
            $factura->ConstructorSobrecargado($row['id_factura'],$row['name'],$row['numero'],$row['TipodePago'],$row['fecha']);
            $lista[]=$factura;
        }
        return $lista;
    }
    public function actualizarfactura($Conexion){
        
        $query = "UPDATE factura SET id_productos='$this->id_productos', precio='$this->precio', isv='$this->isv', cantidad='$this->cantidad' WHERE id_detallefactura='$this->id_detallefactura'";
        $respuesta = new Respuesta();

        if($this->id_usuario=""){
            $respuesta->Error("Ingrese usuario");

         } elseif($this->numero=""){
                $respuesta->Error("Ingrese numero factura");

        }  elseif($this->id_tipopago=""){
                    $respuesta->Error("Ingrese tipo de pago");

         } elseif($this->fecha=""){
                        $respuesta->Error("Ingrese fecha");

        }else{
            if(mysqli_query($Conexion,$query)){
                
                    
                    $respuesta->correcto("Factura Actualizado Correctamente.");
                return $respuesta;
    
                
                
            } else {
                $respuesta->Error("Problema al Modificar" . $Conexion->error);
                return $respuesta;
            }

        }
        
    }
}