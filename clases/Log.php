<?php
    include("Respuesta.php");

    class Log{

        public $id;
        public $usuario;
        public $evento;
        public $fechahora;

        public function ConstructorSobrecargado($usuario,$evento,$fechahora)
        {
            $this->usuario = $usuario;
            $this->evento = $evento;
            $this->fechahora = $fechahora;         
        }

        public function guardarEvento($Conexion)
        {
            $Res = new Respuesta();                        

            mysqli_query($Conexion,"INSERT into logs(usuario, evento, fechahora)
                        values('$this->usuario','$this->evento','$this->fechahora')");  
                        
            if (mysqli_error($Conexion))
            {
                $Res->Error("Error");
            }else{
                $Res->Correcto("Correcto");
            }            
            return $Res;            
        }                               
    }
?>