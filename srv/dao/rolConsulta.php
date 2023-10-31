<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;
use srv\modelo\Rol;

/** @return Rol[] */
function rolConsulta()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    ROL_ID as id,
    ROL_DESCRIPCION as descripcion
   FROM ROL
   ORDER BY ROL_ID"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_CLASS,
  Rol::class
 );
 return recibeFetchAll($resultado);
}
