<?php
session_start();
require_once "../controller/userController.php";

// Creamos una instancia del controlador
$usuarioController = new UsuarioController();

// Captura el valor de la operación solicitada en la URL
$op = isset($_GET['op']) ? $_GET['op'] : '';

switch ($op) {
    case 'verificar':
        // Obtenemos los datos de login y password enviados por AJAX
        $login = isset($_POST['logina']) ? $_POST['logina'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Llamamos al método verificarUsuario en el controlador
        $result = $usuarioController->verificarUsuario($login, $password);

        if ($result) {
            // Si el resultado es válido, lo retornamos como JSON para procesar en la vista
            echo json_encode($result);
        } else {
            // Si no existe el usuario, devolvemos "null" para que el front-end lo interprete
            echo json_encode(null);
        }
        break;

    case 'guardaryeditar':
        // Aquí se manejará el guardado y edición de un usuario
        // Recibimos los datos del formulario
        $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $tipo_documento = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : '';
        $num_documento = isset($_POST['num_documento']) ? $_POST['num_documento'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';

        // Llamamos al método de guardar o editar usuario en el controlador
        $response = $usuarioController->guardarEditarUsuario(
            $idusuario, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $_POST['permiso']
        );

        echo $response;
        break;

    case 'desactivar':
        // Desactivamos un usuario
        $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
        $response = $usuarioController->desactivarUsuario($idusuario);
        echo $response;
        break;

    case 'activar':
        // Activamos un usuario
        $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
        $response = $usuarioController->activarUsuario($idusuario);
        echo $response;
        break;

    case 'listar':
        // Listamos los usuarios
        $response = $usuarioController->listarUsuarios();
        echo json_encode($response);
        break;

    // Otros casos de operación pueden ir aquí...

    default:
        echo "Operación no válida";
        break;
}
?>
