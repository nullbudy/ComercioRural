<?php
include '../core/kernel.php';
require_login();
global $dbcon;
initDatabase();


$nombre = strval($_POST["nombredar"]);
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

$tiempo = time();
$tiempoactual = intval($filad[11]);
$tiempopremium = $tiempoactual - $tiempo;
$tiempofinal = 2592000 + $tiempo;

if ($tiempopremium > 0){
	$tiempofinal = $tiempofinal + $tiempopremium;
	echo 'no va';
}

$consultab="UPDATE cr_users SET premium = 2, premiumtime = '$tiempofinal' WHERE username = '$nombre'";
mysqli_query($dbcon,$consultab);
echo 'Se ha agregado premium por un mes correctamente. <br>';
echo $tiempo.'<br>';
echo $tiempofinal.'<br>';
echo $tiempoactual.'<br>';
echo $tiempopremium;
}


else{echo "Permiso denegado";}
}
else{
	echo 'Vacio';
}
closeDatabase();

?>