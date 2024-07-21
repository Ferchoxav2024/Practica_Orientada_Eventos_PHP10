<?php
session_start();
include ('../dataAccess/conexion/Conexion.php');
include ('../dataAccess/dataAccessLogic/User.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);

    $user = $objUser->login($email, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id']; // Asumiendo que 'cedula' es el identificador del usuario
        $_SESSION['user_name'] = $user['firstName'];
        $_SESSION['user_role'] = $user['perfil'];
        
        if ($user['perfil'] == 'administrador') {
            $response = array('success' => true, 'message' => 'Inicio de sesión correcto', 'redirect' => '../../presentation/pages/administrador/OptionList.php');
        } else {
            $response = array('success' => true, 'message' => 'Inicio de sesión correcto', 'redirect' => '../../presentation/pages/cliente/paginaCliente.php');
        }
    } else {
        $response = array('success' => false, 'message' => 'Credenciales incorrectas');
    }
    error_log(json_encode($response));

    echo json_encode($response);
    exit;
}
?>
