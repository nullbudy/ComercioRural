<?php
include 'core/kernel.php';
require_login();
inc_header();
global $dbcon
?>
<title> Espacio publicitario </title>
<header>
  <?php inc_navbar(); ?>

<maiin>
	<style>
		.caja{
			box-shadow: 3px 1px 3px 2px black;
			margin: 10%;
			background-color: #05bca4;
		}
		body{
			background-color: #ffffc1;
			background: #d53369; /* fallback for old browsers */
			background: -webkit-linear-gradient(to left, #d53369 , #cbad6d); /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to left, #d53369 , #cbad6d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
	</style>
	<div class="caja">
		<center><h4> Por mas informacion contactarse a:</h4></center><img class="float-right" src="/public/img/logo.png" style="width:50px;">
		<p>Telefono: 098.124.750</p>
		<p>Correo electronico: comercioruralcontacto@gmail.com</p>
	</div>
	
</main>