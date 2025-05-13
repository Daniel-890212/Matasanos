<?php
class CondultaDAO {
    private $id;
    private $Fecha;
    private $hora;
    private $idPaciente;
    private $idmedico;
    private $consultorio;
    private $estado;
    private $admin;

    public function __construct() {
        $this->id = 0;
        $this->Fecha = 0;
        $this->hora = 0;
        $this->idPaciente = 0;
        $this->idMedico = 0;
        $this->consultorio = 0;
        $this->estado = 0;
        $this->admin = 0;

    }
    public function ConsultaCitasXPaciente():string {
    return "SELECT c.idCita as '#',c.fecha AS Fecha, c.hora as hora , p.nombre as 'nombre paciente', p.apellido as 'apellido paciente', m.nombre as 'nombre medico', m.apellido as 'apellido medico', con.nombre
    FROM cita c INNER JOIN paciente p on p.idPaciente=c.Paciente_idPaciente
    INNER JOIN medico m on c.Medico_idMedico=m.idMedico
    inner join consultorio con on c.Consultorio_idConsultorio= con.idConsultorio";
    }


}






?>