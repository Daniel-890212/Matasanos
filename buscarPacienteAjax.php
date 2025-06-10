<?php
require("logica/Persona.php");
require("logica/Paciente.php");

$filtro = $_GET["filtro"];
$paciente = new Paciente();
$Palabras = explode(" ", $filtro);
$pacientes = $paciente->buscar($Palabras);

if (count($pacientes) > 0) {
    echo "<table class='table table-striped table-hover mt-3'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Correo</th></tr>";

    foreach ($pacientes as $pac) {
        echo "<tr>";
        echo "<td>" . $pac->getId() . "</td>";
        $nombre = "";
        $apellido = "";
        $nombreResaltado = $pac->getNombre();
        $apellidoResaltado = $pac->getApellido();
        $Palabras = array_filter($Palabras, function($pal) {
    return trim($pal) !== "";
});
        foreach ($Palabras as $pal) {
            if (stripos($pac->getNombre(), $pal) !== false) {
                $nombreResaltado = preg_replace('/' . preg_quote($pal, '/') . '/i', '<strong>$0</strong>', $nombreResaltado);
            }
            if (stripos($pac->getApellido(), $pal) !== false) {
                $apellidoResaltado = preg_replace('/' . preg_quote($pal, '/') . '/i', '<strong>$0</strong>', $apellidoResaltado);
            }
        }
        if ($nombreResaltado == "") {
            $nombre = "<td>" . $pac->getNombre() . "</td>";
            echo $nombre;
        }
        if ($apellidoResaltado == "") {
            $apellido = "<td>" . $pac->getApellido() . "</td>";
            echo $apellido;
        }
        echo "<td>".$nombreResaltado."</td>";
        echo "<td>".$apellidoResaltado."</td>";
        echo "<td>" . $pac->getCorreo() . "</td>";
        echo "</tr>";

    }
    echo "</table>";

} else {
    echo "<div class='alert alert-danger mt-3' role='alert'>No hay resultados</div>";
}
?>