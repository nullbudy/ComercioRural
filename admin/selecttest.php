<?php
include '../core/kernel.php';
require_login();
global $dbcon;

initDatabase();

$consulta = "SELECT * FROM cr_puestos";
$resultado = mysqli_query($dbcon,$consulta);
while(($fila=mysqli_fetch_row($resultado))==true){
	echo $fila[2].'<br>';
}

closeDatabase();
?>