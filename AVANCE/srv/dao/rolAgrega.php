<?php

use srv\dao\AccesoBd;
use srv\modelo\Rol;

function rolAgrega(
 Rol $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "INSERT INTO ROL
    (ROL_ID, ROL_DESCRIPCION)
   VALUES
    (:id, :descripcion)"
 );
 $stmt->execute([
  ":id" => $modelo->id,
  ":descripcion"
  => $modelo->descripcion
 ]);
}
