<?php
  session_start();
  unset($_SESSION["nombre"]); 
  unset($_SESSION["is_admin"]);
  unset($_SESSION["acceso_privado"]);
  session_destroy();
  header("Location: index.php");
  exit;
?>