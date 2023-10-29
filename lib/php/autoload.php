<?php

/**
 * Permite que las clases se puedan
 * cargar automáticamente sin usar
 * require.
 * 
 * Los nombres se buscan dentro del
 * sistema de archivos usando solo
 * minúsculas sin importar como
 * se declaren en el código.
 */

/* Primero hay que cargar el
 * archivo path.php para configurar
 * la búsqueda de archivos.
 */
require_once __DIR__ . "/path.php";

spl_autoload_register();
