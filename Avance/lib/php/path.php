<?php

/**
 * Configura las carpetas para
 * buscar código.
 * 
 * Tenemos que indicar una carpeta
 * raíz; en este caso es la
 * carpeta principal del proyecto.
 * 
 * Ten en cuenta que cuando un
 * servidor corre en Windows, el
 * proyecto usa una subcarpeta,
 * mientras que en producción se
 * usa la carpeta principal.
 * 
 * Tomamos este archivo como punto
 * de referencia. la raíz se ubica
 * subiendo 2 niveles en la
 * estructura de archivos.
 * La carpeta del arcivo es
 * /lib/php
 * /.. es /lib
 * /../.. es /
 */

/* Incluye la carpeta raíz en la
 * ruta de búsqueda de archivos.*/
set_include_path(
 get_include_path()
  . PATH_SEPARATOR
  . __DIR__ . "/../.."
);