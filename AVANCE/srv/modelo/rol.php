<?php

namespace srv\modelo;

require_once
 "lib/php/validaIdNoVacio.php";
require_once
 "lib/php/validaTextoNoVacio.php";
require_once "srv/txt/"
 . "txtFaltaLaDescripcion.php";

class Rol
{

 public string $id;
 public string $descripcion;

 public function valida()
 {
  validaIdNoVacio($this->id);
  $this
   ->validaDescripcionNoVacia();
 }

 function
 validaDescripcionNoVacia()
 {
  validaTextoNoVacio(
   $this->descripcion,
   txtFaltaLaDescripcion()
  );
 }
}
