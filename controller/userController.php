<?php
require_once "../modelos/Usuario.php";

class UsuarioController {

    // Crear una nueva instancia del modelo Usuario
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    // Método para insertar un nuevo usuario
    public function insertarUsuario($nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos) {
        return $this->usuario->insertar($nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos);
    }

    // Método para editar un usuario existente
    public function editarUsuario($idusuario, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos) {
        return $this->usuario->editar($idusuario, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos);
    }

    // Método para desactivar un usuario
    public function desactivarUsuario($idusuario) {
        return $this->usuario->desactivar($idusuario);
    }

    // Método para activar un usuario
    public function activarUsuario($idusuario) {
        return $this->usuario->activar($idusuario);
    }

    // Método para mostrar la información de un usuario
    public function mostrarUsuario($idusuario) {
        return $this->usuario->mostrar($idusuario);
    }

    // Método para listar todos los usuarios
    public function listarUsuarios() {
        return $this->usuario->listar();
    }

    // Método para listar los permisos asignados a un usuario específico
    public function listarPermisosUsuario($idusuario) {
        return $this->usuario->listarmarcados($idusuario);
    }

    // Método para verificar el login de un usuario
    public function verificarUsuario($login, $clave) {
        return $this->usuario->verificar($login, $clave);
    }
}
?>
