<?php
// Iniciar sesión si es necesario y cargar las clases necesarias
session_start();
require_once('controller/loginController.php');

// Obtener la acción de la URL o usar una acción predeterminada
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Enrutar la acción a los controladores correspondientes
switch ($action) {
    case 'login':
        // Llamar al método del controlador de login para mostrar el formulario
        loginController::controladorLogin();
        break;

    // Puedes agregar más casos aquí para otros controladores o acciones, como 'logout', 'register', etc.
    
    default:
        // Acción predeterminada, puede ser redirigir al login o mostrar una página de error
        loginController::controladorLogin();
        break;
}
?>
