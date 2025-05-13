<?php
$id = $_SESSION["id"];
$acceso=$_SESSION["Medico"];
if($acceso == true){
 $medico = new Medico($id);
 $medico -> consultar();
 echo "Hola " . $medico -> getNombre() . " " . $medico -> getApellido();
 echo "Usted tiene la especialidad: " . $medico -> getEspecialidad() -> getNombre();
 
}else{
        header("Location: ?pid=". base64_encode("presentacion/autenticar.php"));

}
 ?>
