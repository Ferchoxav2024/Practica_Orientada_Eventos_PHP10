<?php
include ('../dataAccess/dataAccessLogic/User.php');

// Login Usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);

    $user = $objUser->login($email, $password);
    if ($user) {
        $response = array('success' => true, 'user' => $user);
    } else {
        $response = array('success' => false, 'message' => 'Credenciales incorrectas');
    }
    echo json_encode($response);
    exit;
}
//delete user
else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id= intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);

    $objUser->setId($id);
    $objUser->eliminarUsuario();
    $response = array('sucess'=>true,'message'=>'Usuario eliminado correctamente');
    exit();

}

// Add User
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cedula = $_POST['cedula'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $perfil = $_POST['perfil'];

    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);

    $objUser->setCedula($cedula);
    $objUser->setFirstName($firstName);
    $objUser->setLastName($lastName);
    $objUser->setEmail($email);
    $objUser->setPassword($password);
    $objUser->setTelefono($telefono);
    $objUser->setPerfil($perfil);
    $objUser->registrarUsuario();
    $response = array('success' => true, 'message' => 'Usuario agregado correctamente');
    echo json_encode($response);
    exit;
}

// Listar Usuarios
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);
    $array = $objUser->listarUsuario();
    echo json_encode($array);
    exit;

}

// Editar Usuario
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Obtener datos JSON enviados
    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener el ID de la categoría y otros datos a actualizar
    $id = intval($data['id']);
    $cedula = $data['cedula'] ;
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $password = $data['password'];
    $email = $data['email'];
    $telefono = $data['telefono'];
    $perfil = $data['perfil'];


    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);


    // Setear datos en el objeto de categoría
    $objUser->setId($id);
    $objUser->setCedula($cedula);
    $objUser->setFirstName($firstName);
    $objUser->setLastName($lastName);
    $objUser->setPassword($password);
    $objUser->setEmail($email);
    $objUser->setTelefono($telefono);
    $objUser->setPerfil($perfil);
    $objUser->editarUsuario();
    $response = array('success' => true, 'message' => 'Usuario actualizado correctamente');
    echo json_encode($response);
    exit;
}
?>