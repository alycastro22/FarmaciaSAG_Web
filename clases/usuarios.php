<?php
include("Respuesta.php");

class Usuarios{

    public $Usuarioid;
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

    public function guardarUsuario($Conexion){
      $this->Usuarioid="1";
      $Res = new Respuesta();
      if (trim($this->Correo)==""){
      $Res->Error("Debe ingresar un correo");
      }else{
       mysqli_query($Conexion,
          "INSERT into usuario(correo, contrasena, id_rol)
          values('$this->Correo','$this->Password','$this->Usuarioid')"
      );
      if (mysqli_error($Conexion)){
          $Res->Error("Error al Insertar: " . $Conexion->error);
      }else{
          $Res->Correcto("Se creocorrectamete el  usuario: ".$this->Correo );
      }
      }
      return $Res;
    }

    public function Login($Conexion) 
    {           
        $resultado = mysqli_query($Conexion,"SELECT correo, contrasena FROM usuario WHERE correo = '$this->Correo'");

        $data = $resultado->fetch_assoc();
        $respuesta = new Respuesta();

        if ($data == null) 
        {
          $respuesta->VoidMail("Debes rellenar todos los campos.");
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