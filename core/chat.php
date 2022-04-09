<?php
function preguntar($productoid, $autor, $pregunta) {
	global $dbcon;
    initDatabase();
	$consulta = "INSERT INTO productos_preguntas (productoid, usuario, pregunta) VALUES ('$productoid' , '$autor', '$pregunta')";
	mysqli_query($dbcon, $consulta);
	closeDatabase();
}

function responder($id, $productoid, $respuesta){
    global $dbcon;
    initDatabase();
	$consulta = "UPDATE productos_preguntas SET (productoid, respuesta) VALUES ('$productoid', '$respuesta') WHERE id = $id";
	mysqli_query($dbcon, $consulta);
	closeDatabase();
}
?>
