<?php

/**
 * Recupera el texto de un
 * parámetro enviado al servidor
 * por medio de GET, POST o
 * cookie.
 */
function leeTexto(
 string $parametro
): string {
 /* Si el parámetro está asignado
  * en $_REQUEST, devuelve su
  * valor; de lo contrario,
  * devuelve "". */
 $valor =
  isset($_REQUEST[$parametro])
  ? $_REQUEST[$parametro]
  : "";
 return $valor;
}
