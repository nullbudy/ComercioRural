<?php
include '../core/kernel.php';
require_login();
global $dbcon;

initDatabase();

$usuario = strval($_SESSION['username']);
$consultab="SELECT * FROM cr_users WHERE username='$usuario'";
$resultadosb=mysqli_query($dbcon,$consultab);
$filab=mysqli_fetch_row($resultadosb);
	if ($filab[2] > 2){

$nombre = strval($_POST["nombre"]);
$direccion = strval($_POST["direccion"]);
$telefono = strval($_POST["telefono"]);
$departamento = strval($_POST["departamento"]);
$barrio = strval($_POST["barrio"]);

$consulta = "INSERT INTO cr_puestos (nombre, direccion, telefono, departamento, barrio) VALUES ('$nombre', '$direccion', '$telefono', '$departamento', '$barrio')";
if (mysqli_query($dbcon, $consulta)) {
    echo "El puesto ha sido agregado";
} else {
    echo "Error: " . $consulta . "<br>" . mysqli_error($dbcon);
}


}
else{echo 'permiso denegado';}