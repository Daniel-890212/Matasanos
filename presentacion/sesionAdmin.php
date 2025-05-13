<?php
$id = $_SESSION["id"];
$acceso=$_SESSION["Admin"];
if($acceso == true ){
    $admin = new Admin($id);
$admin -> consultar();
echo "Hola " . $admin -> getNombre() . " " . $admin -> getApellido();
}else{
     header("Location: ?pid=". base64_encode("presentacion/autenticar.php"));
}

?>


AQUI VA EL MENU