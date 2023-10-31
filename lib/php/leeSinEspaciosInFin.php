<?php

require_once
 "lib/php/leeTexto.php";

/**
 * Recupera el texto de un
 * parámetro enviado al servidor
 * por medio de GET, POST o
 * cookie. Elimina los espacios al
 * inicio y al final.
 */
function leeSinEspaciosInFin(
 string $parametro
): string {
 return trim(leeTexto($parametro));
}
