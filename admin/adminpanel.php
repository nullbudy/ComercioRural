<?php
include '../core/kernel.php';
global $dbcon;

initDatabase();

$consulta="SELECT * FROM cr_users";
$resultados=mysqli_query($dbcon,$consulta);
while(($fila=mysqli_fetch_row($resultados))==true){
	if($fila[2] > 1){
		$premium = 'premium';
		//echo $fila[3];
	}
	else{
		$premium = 'no premium';
	}
	echo $fila[3].' es '.$premium.'<br>';
}
// separacion borrar
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
// separacion borrar

$usuario = strval($_SESSION['username']);
$consultab="SELECT * FROM cr_users WHERE username='$usuario'";
$resultadosb=mysqli_query($dbcon,$consultab);
$filab=mysqli_fetch_row($resultadosb);
	if ($filab[2] = 1){
		echo 'Usuario normal';
	}
	elseif($filab[2] = 2){
		echo 'Usuario premium';
	}
	elseif($filab[2] > 2){
		echo 'Usuario admin';
	}

closeDatabase();
?>