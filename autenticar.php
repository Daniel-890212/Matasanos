<?php 
require ("logica/Especialidad.php");
require ("logica/Medico.php");

if(isset($_POST["autenticar"])){
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    echo $correo . "<br>";
    echo $clave . "<br>";
    
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Matasanos EPS</title>

<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">

<!-- FontAwesome -->
<link href="https://use.fontawesome.com/releases/v6.7.2/css/all.css"
	rel="stylesheet">
</head>

<body class="bg-light">

	<div class="container py-4">
		<div class="row align-items-center">
			<div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
				<img src="img/logo.png" alt="Logo Matasanos" class="img-fluid"
					style="width: 150px; height: auto;">
			</div>
			<div class="col-md-8 text-center text-md-start">
				<h1 class="text-primary">Matasanos EPS</h1>
				<p class="text-muted">Cuidamos tu salud y cuidamos de ti</p>
			</div>
		</div>
	</div>

	<div class="container my-5">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header bg-primary">
						<h4>Autenticar</h4>
					</div>
					<div class="card-body">
						<form action="autenticar.php" method="post">
							<div class="mb-3">								
								<input type="email" class="form-control" name="correo" placeholder="Correo">
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="clave" placeholder="Clave">
							</div>							
							<button type="submit" class="btn btn-primary" name="autenticar">Autenticar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

