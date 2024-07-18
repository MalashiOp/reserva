<?php
session_start(); // Iniciar la sesión

// Restablecer todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión u otra página después de cerrar sesión
header("location: index.html");
exit();
?>
