<?php

function mostrarError($errores, $campo){
    $alerta = '';
  if(isset($errores[$campo]) && !empty($campo)){
    $alerta = "<div class='alerta style='color: red'>
    ".$errores[$campo]."</div>";
  }
  return $alerta;
}

function borrarErrores(){
  $_SESSION['errores'] = null;
  $borrado = session_unset();

  return $borrado;
}

 ?>
