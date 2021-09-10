<?php
if(isset($_POST)){
  
  require_once 'includes/conexion.php';

  session_start();

  //recoger valores del formulario
  $nombre = isset($_POST['name']) ? $_POST['name'] : false;
  $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
  $email = isset($_POST['email']) ? $_POST['email'] : false;
  $password = isset($_POST['password']) ? $_POST['password'] : false;

  //errores

  $errores = array();

  //validar datos

  //campo nombre
  if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
    $nombre_validado = true;
  }else{
    $nombre_validado = false;
    $errores['nombre'] = "El nombre no es valido";
  }

  //campo apellidos
  if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
    $apellidos_validado = true;
  }else{
    $apellidos_validado = false;
    $errores['apellidos'] = "Los apellidos no son validos";
  }

  //campo email
  if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_validado = true;
  }else{
    $email_validado = false;
    $errores['email'] = "El email no es valido";
  }

//campo contraseña
  if(empty($password)){
    $pass_validado = false;
    $errores['password'] = "La contraseña no es valida";
  }else{
    $pass_validado = true;
  }
}

$guardar_usuario = false;

if(count($errores) == 0){
    $guardar_usuario = true;
    $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    $sql = "INSERT INTO usuarios VALUES(null, $nombre, $apellidos, $email, $password_segura)";
    $guardar = mysqli_query($db, $sql);

    if($guardar){
      $_SESSION['completado'] = "el registro se ha completado con exito";
    }else{
      $_SESSION['errores']['general']= "Fallo al guardar al usuario";
    }


}else{
  $_SESSION['errores'] = $errores;
}

  header('Location: index.php');

 ?>
