<?php

class MedicoDAO{

    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $Especialidad;

    public function __construct($id=0, $nombre="",$apellido="",$correo="",$clave="", $Especialidad="") {
    $this->id= $id;
    $this->nombre= $nombre;
    $this->apellido= $apellido;
    $this->correo= $correo;
    $this->clave= $clave;
    $this->Especialidad= $Especialidad;
    }

    public function consultar():string {
        return 
        "select idMedico, nombre, apellido, correo, clave, Especialidad_id
        from Medico
        order by Especialidad_id;";
    }

    public function consultaEspecifica($Especialidad): string {
        return 
        "SELECT idMedico, nombre, apellido, correo, clave, Especialidad_id
         FROM Medico
         WHERE Especialidad_id = {$Especialidad}
         order by apellido asc  ;";
    }
    
}
?>