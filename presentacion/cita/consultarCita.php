<?php
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
if($_SERVER['REQUEST_METHOD']=='POST'){
	$idcita=$_POST['cita_id'];
	$idNuevoEstado=$_POST["nuevo_estado"];
	$actualizar=new Cita();
	$actualizar->actualizarEstado($idNuevoEstado,$idcita);
}
?>

<body>
	<?php
	include("presentacion/encabezado.php");
	include("presentacion/menu" . ucfirst($rol) . ".php");
	?>
	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h4>Citas</h4>
					</div>
					<div class="card-body">
							<?php
							$cita = new Cita();
							$citas = $cita->consultar($rol, $id);
							echo "<table class='table table-striped table-hover'>";
							echo "<tr><td>Id</td><td>Fecha</td><td>Hora</td>";
							if ($rol != "paciente") {
								echo "<td>Paciente</td>";
							}
							if ($rol != "medico") {
								echo "<td>Medico</td>";
							}
							echo "<td>Consultorio</td>";
							echo "<td>Estado</td></tr>";
							foreach ($citas as $cit) {
								$estado = new Estado;
								$estados = $estado->consultar();
								echo "<tr>";
								echo "<td>" . $cit->getId() . "</td>";
								echo "<td>" . $cit->getFecha() . "</td>";
								echo "<td>" . $cit->getHora() . "</td>";
								if ($rol != "paciente") {
									echo "<td>" . $cit->getPaciente()->getNombre() . " " . $cit->getPaciente()->getApellido() . "</td>";
								}
								if ($rol != "medico") {
									echo "<td>" . $cit->getMedico()->getNombre() . " " . $cit->getMedico()->getApellido() . "</td>";
								}
								echo "<td>" . $cit->getConsultorio()->getNombre() . "</td>";
								/*el formulario va a devolver a la misma pagina un metodo post
								el input indica que el valor que va a devolver es el que obtenga del id y tambien que el nombre con el que va a llamar al dato que de entregue esa informacion sera cita_id
								*/
								echo "<td> <form action='' method='POST'>
								<input type='hidden' name='cita_id' value=". $cit->getId()."> 
								<select name='nuevo_estado' class='form-control' onchange='this.form.submit()'>";
									foreach ($estados as $est) {
										echo "<option value='" . $est->getid() . "' " . ($cit->getEstado()->getValor() == $est->getValor() ? 'selected' : '') . ">" . $est->getValor() . "</option>";
									}
								echo"</select>
								</form></td>";
								// echo " <td> <input type='text' class='form-control dropdown-toggle' readonly='disabled' placeholder=" . $cit->getEstado()->getValor() . " data-bs-toggle='dropdown' aria-expanded='false'>
    							// <ul class='dropdown-menu w-10'>";
								
    
								// 	foreach($estados as $est){
								// 	echo "<li><a class='dropdown-item' href='#>".$est->getValor()."</a></li>";
								// 	} 
								// echo "</ul></td>";;
								// echo "</tr>";

							}
							echo "</table>";
							?>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>