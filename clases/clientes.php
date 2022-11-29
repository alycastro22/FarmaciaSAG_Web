<<?php
include("Respuesta.php");

class Cliente{
   public $idcliente;
   public $nombrecliente;
   public $fechaNac;
   public $rtn;
   public $direccion;
   public $correo;
   public $contrasena;


public function ConstructorSobrecargado($idcliente, $nombrecliente, $fechaNac, $rtn, $direccion, $correo, $contrasena){
  $this->idcliente=$idcliente;
  $this->nombrecliente=$nombrecliente;
  $this->fechaNac=$fechaNac;
  $this->rtn=$rtn;
  $this->direccion=$direccion;
  $this->correo=$correo;
  $this->contrasena=$contrasena;
}


public function ConstructorSinId( $nombrecliente, $fechaNac, $rtn, $direccion, $correo, $contrasena){
  $this->nombrecliente=$nombrecliente;
  $this->fechaNac=$fechaNac;
  $this->rtn=$rtn;
  $this->direccion=$direccion;
  $this->correo=$correo;
  $this->contrasena=$contrasena;
}

public function ConstructorLogin($correo,$contrasena){
    $this->correo = $correo;
    $this->contrasena = $contrasena;
}

public function Login($Conexion)
{
    $resultado = mysqli_query($Conexion,"SELECT correo, contrasena FROM clientes WHERE correo = '$this->correo'");
    $data = $resultado->fetch_assoc();
    $respuesta = new Respuesta();

    if ($data == null)
    {
        $respuesta->Error("El correo que intentas utilizar no existe");
        return $respuesta;
    } else if ($data['Password'] == $this->Password) {
        $respuesta->Correcto("Inicio de sesion exitoso");
        return $respuesta;
    } else {
        $respuesta->Error("Contrasena o usuario incorrecto");
        return $respuesta;
    }

}
}

 ?>
