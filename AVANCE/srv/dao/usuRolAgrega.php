<?php

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuRolAgrega(
 Usuario $usuario
) {
 $roles = $usuario->roles;
 if (sizeof($roles) > 0) {
  $con = AccesoBd::getCon();
  $stmt = $con->prepare(
   "INSERT INTO USU_ROL
     (USU_ID, ROL_ID)
     VALUES
      (:usuId, :rolId)"
  );
  foreach ($roles as $rol) {
   $stmt->execute(
    [
     ":usuId" => $usuario->id,
     ":rolId" => $rol->id
    ]
   );
  }
 }
}
