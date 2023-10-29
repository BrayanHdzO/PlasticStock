<?php

require_once
 "srv/dao/usuRolConsulta.php";

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuarioBuscaCue(
 string $cue
) {
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
    USU_ID as id,
    USU_CUE as cue,
    USU_MATCH as match
   FROM USUARIO
   WHERE USU_CUE = :cue"
 );
 $stmt->execute([":cue" => $cue]);
 $stmt->setFetchMode(
  PDO::FETCH_CLASS,
  Usuario::class
 );
 /** @var false|Usuario */
 $usuario = $stmt->fetch();
 if ($usuario === false) {
  return false;
 } else {
  $usuario->roles =
   usuRolConsulta($usuario->id);
  return $usuario;
 }
}
