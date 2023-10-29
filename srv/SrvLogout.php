<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once "srv/const/CUE.php";
require_once
 "srv/const/ROL_IDS.php";

use lib\php\Servicio;

class SrvLogout extends Servicio
{

 protected
 function implementacion()
 {
  session_start();
  if (isset($_SESSION[CUE])) {
   unset($_SESSION[CUE]);
  }
  if (isset($_SESSION[ROL_IDS])) {
   unset($_SESSION[ROL_IDS]);
  }
  session_destroy();
  return [];
 }
}

$servicio = new SrvLogout();
$servicio->ejecuta();
