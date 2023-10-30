<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once "srv/const/CUE.php";
require_once
 "srv/const/ROL_IDS.php";

use lib\php\Servicio;


class SrvSesion extends Servicio
{
 protected
 function implementacion()
 {
  session_start();
  $cue =
   isset($_SESSION[CUE])
   ? $_SESSION[CUE] : "";
  $rolIds =
   isset($_SESSION[ROL_IDS])
   ? $_SESSION[ROL_IDS] : [];
  return [
   CUE => $cue,
   ROL_IDS => $rolIds
  ];
 }
}

$servicio = new SrvSesion();
$servicio->ejecuta();
