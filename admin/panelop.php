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

<ul class="nav nav-tabs nav-fill">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#premium">Dar premium</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Lista">Lista-Premium</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Lista2">Lista-Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Lista3">Lista-Usuarios</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane container active" id="premium">
  	<br>

  	<div class="justify-center">
  	<form class="form-control" action="addpremium" method="post">
	<input type="text" name="nombredar" placeholder="Nombre">
	<br>
	<input class="btn btn-primary btn-sm" type="submit" value="Dar premium">
	</form>
	</div>

	<br>

	<div class="justify-center">
  	<form class="form-control" action="quitarpremium" method="post">
	<input type="text" name="nombrequitar" placeholder="Nombre">
	<br>
	<input class="btn btn-primary" type="submit" value="Remover">
	</form>

	<br>

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

<div class="justify-center">
  	<form class="form-control" action="agregarbilletes" method="post">
	<input type="text" name="nombre" placeholder="Nombre">
	<input type="number" step="1" name="billetes" placeholder="Billetes">
	<br>
	<input class="btn btn-primary" type="submit" value="Entregar">
	</form>
</div>
</div>
</div>
  <div class="tab-pane container fade" id="Lista">
  	<br>
	<div class="table-responsive-sm">
	<h2>Premium</h2>
	<table class="table table-hover table-responsive">
		<thead>
			<td>Nombre</td>
			<td>Correo</td>
		</thead>
		<tbody>
<?php
$consulta="SELECT * FROM cr_users";
$resultados=mysqli_query($dbcon,$consulta);
while(($fila=mysqli_fetch_row($resultados))==true){
	if($fila[2] == 2){
	echo '<tr>';
	echo '<td>'.$fila[3].'</td>';
	echo '<td>'.$fila[4].'</td>';
	echo '</td>';
	}
}
?>
		</tbody>
	</table>
</div>
</div>
 <div class="tab-pane container fade" id="Lista2">
<div class="table-responsive-sm">
	<h2>Admins</h2>
	<table class="table table-hover table-responsive">
		<thead>
			<td>Nombre</td>
			<td>Correo</td>
		</thead>
		<tbody>
<?php
$consulta="SELECT * FROM cr_users";
$resultados=mysqli_query($dbcon,$consulta);
while(($fila=mysqli_fetch_row($resultados))==true){
	if($fila[2] > 2){
	echo '<tr>';
	echo '<td>'.$fila[3].'</td>';
	echo '<td>'.$fila[4].'</td>';
	echo '</td>';
	}
}
?>
		</tbody>
	</table>
</div>
</div>

<div class="tab-pane container fade" id="Lista3">
<div class="table-responsive-sm">
	<h2>Usuarios</h2>
	<table class="table table-hover table-responsive">
		<thead>
			<td>Nombre</td>
			<td>Correo</td>
		</thead>
		<tbody>
<?php
$consulta="SELECT * FROM cr_users";
$resultados=mysqli_query($dbcon,$consulta);
while(($fila=mysqli_fetch_row($resultados))==true){
	if($fila[2] < 2){
	echo '<tr>';
	echo '<td>'.$fila[3].'</td>';
	echo '<td>'.$fila[4].'</td>';
	echo '</td>';
	}
}
?>
		</tbody>
	</table>

</div>
</div>

</div>

<?php
	}
	else{
		echo 'Permiso denegado';
	}


closeDatabase();
?>