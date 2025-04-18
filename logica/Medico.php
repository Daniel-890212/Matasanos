<?php
//require ("persistencia/Conexion.php");
require ("persistencia/MedicoDAO.php");
require ("logica/Persona.php");

class Medico extends Persona{
    private $Especialidad;

    public function getEspecialidad() {
       return $this->Especialidad;
    }

    public function __construct($id=0,$nombre="",$Apellido="",$correo="",$clave="", $Especialidad=""){
     parent:: __construct($id,$nombre,$Apellido,$correo,$clave);
     $this->Especialidad = $Especialidad;
    }

    public function Consultar(): array{
        $conexion = new Conexion();
        $MedicoDao = new MedicoDAO();
        $conexion -> abrir();
         $conexion -> ejecutar($MedicoDao->consultar());
         $Medicos = array();
        while (($datos = $conexion -> registro()) != null){
            $medico= new Medico($datos[0],$datos[1],$datos[2],$datos[3],$datos[4], $datos[5]);
         array_push($Medicos, $medico);
         }
        return $Medicos;
    }
    public function ConsultaEspecialidad($especialidad): array{
        $conexion = new Conexion();
        $MedicoDao = new MedicoDAO();
        $conexion -> abrir();
         $conexion -> ejecutar($MedicoDao->consultaEspecifica($especialidad));
         $Medicos = array();
        while (($datos = $conexion -> registro()) != null){
            $medico= new Medico($datos[0],$datos[1],$datos[2],$datos[3],$datos[4], $datos[5]);
         array_push($Medicos, $medico);
         }
        return $Medicos;
    }
}
?>