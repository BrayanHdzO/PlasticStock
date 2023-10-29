<?php

/**
 * Declara el espacio de nombre de
 * la clase. Es como la carpeta,
 * pero desde el punto de vista del
 * código.
 */
namespace lib\php;

/**
 * Clase base para implementar
 * servicios. Las clases derivadas
 * deben extender esta clase y
 * proporcionar el código para la
 * función llamada implementacion.
 */
abstract class Servicio
{

 abstract protected
 function implementacion();

 public function ejecuta()
 {
  try {
   $this->usaUtf8();
   $resultado =
    $this->implementacion();
   $this->devuelveJson($resultado);
  } catch (\Throwable $t) {
   $this->devuelveError($t);
  }
 }

 private function usaUtf8()
 {
  mb_internal_encoding("UTF-8");
 }

 private function devuelveJson(
  $resultado
 ) {
  header("Content-Type: "
   . "application/json");
  echo json_encode($resultado);
 }

 private function devuelveError(
  \Throwable $t
 ) {
  header(
   "Content-Type: text/plain"
  );
  http_response_code(500);
  echo $t->getMessage();
 }
}
