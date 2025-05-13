<?php

include("persistencia/CondultaDAO.php");
class Consulta{
    private $id;
    private $Fecha;
    private $hora;
    private $Paciente;
    private $medico;
    private $consultorio;
    private $estado;
    private $admin;

    public function __construct($id=0,$Fecha=0,$hora=0,$idPaciente=0,$idmedico=0,$consultorio=0,$estado= 0,$admin= 0){
$this->id = $id;
$this->Fecha = $Fecha;
$this->hora = $hora;
$this->idPaciente = $idPaciente;
$this->medico = $idmedico;
$this->consultorio = $consultorio;
$this->estado = $estado;
$this->admin = $admin;
    } 
public function getId(){
    return $this->id;
}
public function getFecha(){
    return $this->Fecha;
}
public function getHora(){
    return $this->hora;
}
public function getIdPaciente(){
    return $this->Paciente;
}
public function getIdMedico(){  
    return $this->medico;
}
public function getConsultorio(){
    return $this->consultorio;
}
public function getestado(){
    return $this->estado;
}
public function consultar(){
    $conexion = new Conexion();
    $CondultaDAO = new CondultaDAO();
    $conexion -> abrir();
    $conexion -> ejecutar($CondultaDAO -> ConsultaCitasXPaciente());
    $consultas = array();
    while (($datos = $conexion->registro()) != null) {
        $consulta = new Consulta($datos[0],$datos[1],$datos[2]);
        array_push($consultas, $consulta);
    }
    $conexion->cerrar();
    return $consultas;
}
}
?>