<?php

function valida(
 bool $condicion,
 string $mensajeDeError
) {
 if (!$condicion) {
  throw new Exception(
   $mensajeDeError
  );
 }
}
