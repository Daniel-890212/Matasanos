<?php
require_once("persistencia/Conexion.php");
require_once ("persistencia/EstadoDAO.php");
class Estado{
    private $id;
    private $valor;
    
    public function __construct($id=0, $valor=""){
        $this -> id = $id;
        $this -> valor = $valor;
    }
    public function getid(){
        return $this->id;
    }
    public function getValor(){
        return $this->valor;
    }
    
public function consultar(){
        $conexion = new Conexion();
        $EstadoDAO = new EstadoDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($EstadoDAO->consultar());
        $Estados = array();
        while(($datos = $conexion -> registro()) != null){
            $Estado = new Estado($datos[0], $datos[1]);     
            array_push($Estados, $Estado);
        }
        $conexion -> cerrar();
        return $Estados;
    }
}


?>