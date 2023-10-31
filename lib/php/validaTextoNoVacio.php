<?php

require_once "lib/php/valida.php";

function validaTextoNoVacio(
 string $texto,
 string $mensajeDeError
) {
 valida(
  $texto !== "",
  $mensajeDeError
 );
}
