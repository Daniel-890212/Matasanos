<?php

class EstadoDAO{
    private $id;
    private $Valor;
    
    public function __construct($id=0, $valor=""){
        $this -> id = $id;
        $this -> Valor = $valor;
    }
    
    public function consultar(){
        return "SELECT idEstadoCita, valor
                from estadocita 
                order by idEstadocita DESC";
    }
        public function Actualizar($id, $NuevoEstado)
    {
        $sentencia = "UPDATE estadocita SET valor='$NuevoEstado' WHERE idEstadoCita=$id;";
        return $sentencia;
    }
    
    
}


?>