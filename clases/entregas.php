<?php
include("Respuesta.php");

class Entregas{
    public $identrega;
    public $idfactura;
    public $direccion;
    public $telefono;
    public $estado;
    public $idempleado;
    public $nombreu;


    public function ConstructorSobrecargado($identrega, $idfactura, $direccion, $telefono, $estado,  $idempleado){
        $this->identrega=$identrega;
        $this->idfactura=$idfactura;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->estado=$estado;
        $this->idempleado=$idempleado;
    }
    public function ConstructorEntrega($identrega, $nombreu, $idfactura, $direccion, $telefono, $estado){
        $this->identrega=$identrega;
        $this->nombreu=$nombreu;
        $this->idfactura=$idfactura;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->estado=$estado;
        
    }

    public function ConstructorEstado($identrega, $estado){
        $this->identrega=$identrega;
        $this->estado=$estado;
       
    }

    public function listarEntregas($Conexion){
        $query = "SELECT E.id_entrega, U.name, F.numero, E.Direccion,E.Telefono, E.estado From entrega as E 
        Inner Join factura as F ON E.id_factura=F.id_factura Inner JOIN usuarios as U on F.id_usuario=U.id";
        $resultado = mysqli_query($Conexion, $query);
        $lista = array();
        while ($row = mysqli_fetch_array($resultado))
        {
            $entregas = new Entregas();
            $entregas->ConstructorEntrega($row['id_entrega'],$row['name'],$row['numero'],$row['Direccion'],$row['Telefono'],$row['estado']);
            $lista[]=$entregas;
        }
        return $lista;
    }

    public function actualizarestado($Conexion){
        
        $query = "UPDATE entrega SET estado='$this->estado' WHERE id_entrega='$this->identrega'";
        $respuesta = new Respuesta();

        if($this->estado==""){
            $respuesta->Error("Ingrese Estado");

        }else{
            if(mysqli_query($Conexion,$query)){
                if($this->estado=="Enviada"){
                    $respuesta->correcto("Entrega Enviada exitosamente.");
                    return $respuesta;  
                }else{
                    $respuesta->correcto("Entrega Cancelada exitosamente.");
                return $respuesta;
    
                }
                
            } else {
                $respuesta->Error("Problema al Modificar" . $Conexion->error);
                return $respuesta;
            }

        }
        
    }









}



?>