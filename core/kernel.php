<?php
session_start();
include 'config.php'; // para incluir la configuración
loadConfig();
include 'dbconnector.php'; // incluimos al kernel las funciones de la database

// Por si queremos la IP de alguien

function getUserIP()
{
  $client  = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote  = $_SERVER['REMOTE_ADDR'];

  if(filter_var($client, FILTER_VALIDATE_IP))
  {
    $ip = $client;
  }
  elseif(filter_var($forward, FILTER_VALIDATE_IP))
  {
    $ip = $forward;
  }
  else
  {
    $ip = $remote;
  }

  return $ip;
}

// Para limpiar variables, las ' y otros caracteres cómo espacios al final

function cleanValue($str){
  global $dbcon;
  initDatabase();
  $str = mysqli_real_escape_string($dbcon,$str);
  $str = htmlspecialchars($str, ENT_IGNORE, 'utf-8');
  $str = strip_tags($str);
  $str = stripslashes($str);
  return $str;
}

/*
* Las plantillas, header, navbar, footer, etc
*/

function require_login(){
  if(!is_logged())
  header("Location: " . WEB_RUTA . "/login");
}

function is_logged(){
  return (isset($_SESSION['username']));
}

function inc_header(){
  include 'inc/Header.php';
}

function inc_navbar(){
  include 'inc/Navbar.php';
}

function inc_footer(){
  include 'inc/Footer.php';
}

global $billetesdelusuario;
global $premiumvalue;
global $premiumtime;



initDatabase();
$usuario = $_SESSION['username'];
$consultabilletes="SELECT * FROM cr_users WHERE username= '$usuario' " ;
$resultadosbilletes=mysqli_query($dbcon,$consultabilletes);
$filabilletes=mysqli_fetch_row($resultadosbilletes);
$billetesdelusuario = $filabilletes[9];
$premiumtime = $filabilletes[11];
$premiumvalue = $filabilletes[2];
closeDatabase();


$tiempo = time();
$tiempopremium = $premiumtime - $tiempo;
if ($tiempopremium < 0){
  initDatabase();
  $quitarpremium="UPDATE cr_users SET premium = 1, premiumtime = 0 WHERE username = '$usuario'";
  mysqli_query($dbcon,$quitarpremium);
  closeDatabase();
}


?>


