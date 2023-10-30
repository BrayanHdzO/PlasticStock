<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/const/CUE.php";
require_once "srv/const/ROL_IDS.php";
require_once "srv/const/ROL_VENDEDOR.php";
require_once "srv/txt/txtNoPermitido.php";

use lib\php\Servicio;

class SrvSaludoVendedor extends Servicio
{
    protected function implementacion()
    {
        session_start();
        $cue = isset($_SESSION[CUE]) ? $_SESSION[CUE] : "";
        $rolIds = isset($_SESSION[ROL_IDS]) ? $_SESSION[ROL_IDS] : [];
        if (array_search(ROL_VENDEDOR, $rolIds) === false) {
            throw new Exception(txtNoPermitido());
        }
        return "Hola " . $cue;
    }
}

$servicio = new SrvSaludoVendedor();
$servicio->ejecuta();
