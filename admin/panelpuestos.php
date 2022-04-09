<?php
include '../core/kernel.php';
require_login();
inc_header();
global $dbcon;

initDatabase();

$usuario = strval($_SESSION['username']);
$consultab="SELECT * FROM cr_users WHERE username='$usuario'";
$resultadosb=mysqli_query($dbcon,$consultab);
$filab=mysqli_fetch_row($resultadosb);
	if ($filab[2] > 2){
		?>

<div class="container">
<div class="justify-center">
  	<form class="form-control" action="agregarpuesto" method="post">
	<input type="text" name="nombre" placeholder="Nombre">
	<input type="text" name="direccion" placeholder="Direccion">
	<input type="text" name="telefono" placeholder="Telefono">
	<input type="text" name="departamento" placeholder="Departamento">
	<input type="text" name="barrio" placeholder="Barrio">
	<br>
	<input class="btn btn-primary" type="submit" value="Establecer">
	</form>
</div>

<?php
}
else{
	echo 'permiso denegado';
}