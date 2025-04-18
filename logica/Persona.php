<?php

class Persona {
    protected $id;
    protected $nombre;
    protected $Apellido;
    protected $correo;
    protected $clave;

    public function getId(): mixed {
        return $this->id;
    }
    public function getNombre(): mixed{
        return $this->nombre;
    }
    public function getApellido(): mixed {
        return $this->Apellido;
    }
    public function getCorreo(): mixed {
        return $this->correo;
    }
    public function getClave(): mixed {
        return $this->clave;
    }
    public function __construct($id=0, $nombre="", $Apellido="", $correo="", $clave="") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->Apellido = $Apellido;
        $this->correo = $correo;
        $this->clave = $clave;
    }


}
?>