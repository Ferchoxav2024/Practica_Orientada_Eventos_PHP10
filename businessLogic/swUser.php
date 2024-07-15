<?php
include ('../dataAccess/dataAccessLogic/User.php');


//delete user
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $cedula= ($_GET['cedula']);
    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);

    $objUser->setCedula($cedula);
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

    $data= json_decode(file_get_contents('php://input'), true);
    $cedula = ($data['cedula']) ;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $perfil = $_POST['perfil'];

    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);

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