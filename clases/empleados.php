<?php
include("Respuesta.php");

class Empleados{

    public $Empleadoid;
    public $Correo;
    public $Password;

    public function ConstructorSobrecargado($Correo,$Password){
        $this->Correo = $Correo;
        $this->Password = $Password;
    }

    public function ConstructorLogin($Correo,$Password){
        $this->Correo = $Correo;
        $this->Password = $Password;
    }

    public function Login($Conexion)
    {
        $resultado = mysqli_query($Conexion,"SELECT correo, contrasena FROM empleado WHERE correo = '$this->Correo'");
        $data = $resultado->fetch_assoc();
        $respuesta = new Respuesta();

        if ($data == null)
        {
            $respuesta->Error("El correo que intentas utilizar no existe");
            return $respuesta;
        } else if ($data['contrasena'] == $this->Password) {
            $respuesta->Correcto("Inicio de sesion exitoso");
            return $respuesta;
        } else {
            $respuesta->Error("Contrasena o usuario incorrecto");
            return $respuesta;
        }
    }
}
?>
