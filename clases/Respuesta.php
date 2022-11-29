<?php
class Respuesta {
    public $Ok;
    public $Data;

    public function Error($notificacion) {
        $this->Ok = 0;
        $this->Data = $notificacion;
    }

    public function VoidMail($text){
        $this->OK= 0;
        $this->Data = $text;
    }

    public function Correcto($data) {
        $this->Ok = 1;
        $this->Data = $data;
    }
}
?>
