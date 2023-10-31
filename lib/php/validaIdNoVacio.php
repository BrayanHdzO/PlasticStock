<?php

require_once
 "lib/php/validaTextoNoVacio.php";
require_once
 "lib/php/txt/txtFaltaElId.php";

function validaIdNoVacio(
 string $id
) {
 validaTextoNoVacio(
  $id,
  txtFaltaElId()
 );
}
