<?php

namespace srv\dao;

require_once
 "srv/const/ROL_EMPLEADO.php";
require_once
 "srv/const/ROL_ENCARGADO.php";
require_once
 "srv/const/ROL_ADMINISTRADOR.php";
require_once "srv/dao/bdCrea.php";
require_once
 "srv/dao/usuarioBuscaCue.php";
require_once
 "srv/dao/usuarioAgrega.php";
require_once
 "srv/dao/rolConsulta.php";
require_once
 "srv/dao/rolAgrega.php";
require_once "srv/txt/"
 . "txtAdministraElSistema.php";
require_once
 "srv/txt/txtRealizaFunciones.php";
require_once
 "srv/txt/txtRealizaOperaciones.php";


use \PDO;
use srv\modelo\Rol;
use srv\modelo\Usuario;

class AccesoBd
{

 private static ?PDO $con = null;

 static function getCon(): \PDO
 {
  if (self::$con === null) {
   self::$con = self::conecta();
   self::prepara(self::$con);
  }
  return self::$con;
 }

 private static
 function conecta(): \PDO
 {
  return new PDO(
   // cadena de conexión
   "sqlite:srvaut.db",
   // usuario
   null,
   // contraseña
   null,
   [PDO::ATTR_ERRMODE =>
   PDO::ERRMODE_EXCEPTION]
  );
 }

 private static
 function prepara(PDO $con)
 {
  bdCrea($con);
  $roles = rolConsulta();
  if (sizeof($roles) === 0) {

   $admin = new Rol();
   $admin->id = ROL_ADMINISTRADOR;
   $admin->descripcion =
    txtAdministraElSistema();
   rolAgrega($admin);

   $empleado = new Rol();
   $empleado->id = ROL_EMPLEADO;
   $empleado->descripcion =
    txtRealizaFunciones();
   rolAgrega($empleado);

   $encargado = new Rol();
   $encargado->id = ROL_ENCARGADO;
   $encargado->descripcion =
    txtRealizaOperaciones();
   rolAgrega($encargado);

     $usuario =
   usuarioBuscaCue("Briant");
  if (!$usuario) {
   $usuario = new Usuario();
   $usuario->cue = "Briant";
   $usuario->match = "Briant";
   $usuario->roles = [$empleado];
   usuarioAgrega($usuario);
  }

     $usuario =
    usuarioBuscaCue("Brayan");
   if (!$usuario) {
    $usuario = new Usuario();
    $usuario->cue = "Brayan";
    $usuario->match = "brayan";
    $usuario->roles = [$admin,$encargado];
    usuarioAgrega($usuario);
   }

      $usuario =
    usuarioBuscaCue("Carlos");
   if (!$usuario) {
    $usuario = new Usuario();
    $usuario->cue = "Carlos";
    $usuario->match = "carlos";
    $usuario->roles = [$encargado];
    usuarioAgrega($usuario);
   }

         $usuario =
    usuarioBuscaCue("Ricardo");
   if (!$usuario) {
    $usuario = new Usuario();
    $usuario->cue = "Ricardo";
    $usuario->match = "ricardo";
    $usuario->roles = [$encargado];
    usuarioAgrega($usuario);
   }

   $usuario =
    usuarioBuscaCue("Juan");
   if (!$usuario) {
    $usuario = new Usuario();
    $usuario->cue = "Juan";
    $usuario->match = "juan";
    $usuario->roles = [$empleado];
    usuarioAgrega($usuario);
   }

   $usuario =
    usuarioBuscaCue("susana");
   if (!$usuario) {
    $usuario = new Usuario();
    $usuario->cue = "susana";
    $usuario->match = "alegria";
    $usuario->roles = [$admin];
    usuarioAgrega($usuario);
   }

   $usuario =
    usuarioBuscaCue("bebe");
   if (!$usuario) {
    $usuario = new Usuario();
    $usuario->cue = "bebe";
    $usuario->match = "saurio";
    $usuario->roles =
     [$admin, $empleado];
    usuarioAgrega($usuario);
   }
  }
 }
}
