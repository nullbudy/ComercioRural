<?php
include '../core/kernel.php';
require_login();
global $dbcon;

initDatabase();


$billetes = intval($_POST["billetes"]);
$nombre = strval($_POST["nombre"]);

if (strlen($nombre || $billetes) > 0){

$usuario = strval($_SESSION['username']);
$consultac="SELECT * FROM cr_users WHERE username='$usuario'";
$resultadosc=mysqli_query($dbcon,$consultac);
$filac=mysqli_fetch_row($resultadosc);
//echo $filac[2];
if ($filac[2] > 2){

$consulta="SELECT billetes FROM cr_users WHERE username='$nombre'";
$resultados=mysqli_query($dbcon,$consulta);
$fila=mysqli_fetch_row($resultados);
$billetes = $fila[0] + $billetes;
$consultab="UPDATE cr_users SET billetes = $billetes WHERE username = '$nombre'";
$resultadosb=mysqli_query($dbcon,$consultab);
echo 'Billetes entregados con exito';
}

else{echo "Permiso denegado";}
}
else{
	echo 'Vacio';
}
closeDatabase();

?>

