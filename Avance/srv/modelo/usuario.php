<?php

namespace srv\modelo;

require_once "lib/php/valida.php";
require_once
 "lib/php/validaIdNoVacio.php";
require_once
 "lib/php/validaTextoNoVacio.php";
require_once
 "srv/txt/txtFaltaElCue.php";
require_once
 "srv/txt/txtFaltaElMatch.php";
require_once
 "srv/txt/txtNoEsUnRol.php";

use srv\modelo\Rol;
use \Exception;

class Usuario
{

 public int $id;
 public string $cue;
 public string $match;
 /** @var Rol[] */
 public array $roles;

 public function valida()
 {
  if (
   $this->cue === null
   || $this->cue === ""
  ) {
   throw new Exception(
    txtFaltaElCue()
   );
  }
  if (
   $this->match === null
   || $this->match === ""
  ) {
   throw new Exception(
    txtFaltaElMatch()
   );
  }
 }
}
