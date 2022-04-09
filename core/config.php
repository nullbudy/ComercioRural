<?php

function loadConfig(){ // Es para evitar cosas raras
  define('DEBUG', true); // Si la web está en modo debug, mostrará más información en los errores y esas mierdas

  define('WEB_RUTA', ''); // La ruta de la web dentro del dominio
  define('WEB_TITULO', 'ComercioRural'); // El titulo de la web

  /*
  * Configuración de la base de datos
  */
  define('DB_HOST', 'localhost');
  define('DB_USER', 'phpmyadmin');
  define('DB_PASS', 'crlapassword');
  define('DB_NAME', 'cr_db'); // Conexión Rural Database a.k.a. CR_DB

  define('HASH_SALT', 'c0n3x10nrur4l');


}

?>
