<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once "srv/const/CUE.php";
require_once
 "srv/const/ROL_IDS.php";
require_once
 "srv/dao/usuarioVerifica.php";
require_once
 "lib/php/leeTexto.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";
require_once "srv/txt/"
 . "txtDatosIncorrectos.php";

use \lib\php\Servicio;
use srv\modelo\Rol;

class SrvLogin extends Servicio
{

 protected
 function implementacion()
 {
  session_start();
  $cue =
   leeSinEspaciosInFin("cue");
  $match = leeTexto("match");
  $roles =
   usuarioVerifica($cue, $match);
  if ($roles === false) {
   throw new Exception(
    txtDatosIncorrectos()
   );
  } else {
   $rolIds = extraeIds($roles);
   $_SESSION[CUE] = $cue;
   $_SESSION[ROL_IDS] = $rolIds;
   return [
    CUE => $cue,
    ROL_IDS => $rolIds
   ];
  }
 }
}

$servicio =
 new SrvLogin();
$servicio->ejecuta();

/**
 * @param Rol[] $roles
 * @return string[]
 */
function extraeIds(
 array $roles
): array {
 /** @var string[] */
 $rolIds = [];
 foreach ($roles as $rol) {
  $rolIds[] = $rol->id;
 }
 return $rolIds;
}

/**
 * @param Rol[] $roles
 * @return string
 */
function renderRoles(
 array $roles
): array {
 /** @var string[] */
 $render = "";
 foreach ($roles as $rol) {
  $id = htmlentities($rol->id);
  $descripcion = htmlentities(
   $rol->descripcion
  );
  $render .=
   "<li>
     <p>
      <strong>{$id}</strong>
      <br>{$descripcion}
     </p>
    </li>";
 }
 return $render;
}
