<?php

require_once
 "srv/dao/usuarioBuscaCue.php";

function usuarioVerifica(
 string $cue,
 string $match
) {
 $usuario = usuarioBuscaCue($cue);
 if (
  $usuario !== false
  && password_verify(
   $match,
   $usuario->match
  )
 ) {
  return $usuario->roles;
 } else {
  return false;
 }
}
