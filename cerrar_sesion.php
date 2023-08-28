<?php
// Iniciar la sesión si aún no está iniciada
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar a la página de inicio o a donde desees después de cerrar la sesión
header("Location: login.php"); // Cambia "index.php" por la página a la que deseas redirigir
//exit;
?>