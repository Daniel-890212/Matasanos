<?php

class PacienteDAO
{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $fechaNacimiento;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $fechaNacimiento = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->fechaNacimiento = $fechaNacimiento;
    }


    public function autenticar()
    {
        return "select idPaciente
                from Paciente
                where correo = '" . $this->correo . "' and clave = '" . md5($this->clave) . "'";
    }

    public function consultar()
    {
        return "select p.nombre, p.apellido, p.correo, p.fechaNacimiento  
                from Paciente p
                where idPaciente = '" . $this->id . "'";
    }

    public function buscar($filtro)
    {
        return "select p.idPaciente, p.nombre, p.apellido, p.correo
                from Paciente p
                where p.nombre like '%" . $filtro . "%' or p.apellido like '%" . $filtro . "%'";
    }
    public function buscarMultitud($filtro){
        foreach($filtro as $fil){
            $sentencia []= "(p.nombre like '%" . $fil . "%' or p.apellido like '%" . $fil . "%')";
            $consulta = implode(" and ", $sentencia);
        }
        return "select p.idPaciente, p.nombre, p.apellido, p.correo
                from Paciente p
                where $consulta
                group by idPaciente";
    }
}
