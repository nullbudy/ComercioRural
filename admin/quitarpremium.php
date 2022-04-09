<?php
include '../core/kernel.php';
require_login();
global $dbcon;

initDatabase();


$nombre = strval($_POST["nombrequitar"]);
if (strlen($nombre) > 0){

$usuario = strval($_SESSION['username']);
$consultac="SELECT * FROM cr_users WHERE username='$usuario'";
$resultadosc=mysqli_query($dbcon,$consultac);
$filac=mysqli_fetch_row($resultadosc);
//echo $filac[2];
if ($filac[2] > 2){

$consultad="SELECT * FROM cr_users WHERE username='$nombre'";
$resultadosd=mysqli_query($dbcon,$consultad);
$filad=mysqli_fetch_row($resultadosd);
 if(is_null($filad[3]) || !isset($filad[3])){echo 'Este usuario no existe';}
if ($filad[2] > 1){
$consultab="UPDATE cr_users SET premium = 1, premiumtime = 0 WHERE username = '$nombre'";
$resultadosb=mysqli_query($dbcon,$consultab);
}

else{echo "Este usuario no tiene permisos, codigo: ".$filad[2];}
}
else{echo "Permiso denegado";}
}
else{
	echo 'Vacio';
}
closeDatabase();

?>
