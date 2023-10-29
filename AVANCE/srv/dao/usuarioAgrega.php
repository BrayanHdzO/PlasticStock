<?php

require_once
 "srv/dao/usuRolAgrega.php";

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuarioAgrega(
 Usuario $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $stmt = $con->prepare(
  "INSERT INTO USUARIO
    (USU_CUE, USU_MATCH)
   VALUES
    (:cue, :match)"
 );
 $stmt->execute([
  ":cue" => $modelo->cue,
  ":match"
  => password_hash(
   $modelo->match,
   PASSWORD_DEFAULT
  )
 ]);
 /* Si usas una secuencia para
  * generar el id, pasa como
  * parámetro de lastInsertId el
  * nombre de dicha secuencia. */
 $modelo->id =
  $con->lastInsertId();
 usuRolAgrega($modelo);
 $con->commit();
}
